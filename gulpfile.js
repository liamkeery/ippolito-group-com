var gulp          = require('gulp');
var browserSync   = require('browser-sync').create();
var $             = require('gulp-load-plugins')();
var autoprefixer  = require('autoprefixer');
var imagemin = require('gulp-imagemin');
var uglify = require('gulp-uglify');
var pipeline = require('readable-stream').pipeline;

var sassPaths = [
  'node_modules/foundation-sites/scss',
  'node_modules/motion-ui/src'
];

function sass() {
  return gulp.src('scss/app.scss')
    .pipe($.sass({
      includePaths: sassPaths,
      outputStyle: 'compressed' // if css compressed **file size**
    })
      .on('error', $.sass.logError))
    .pipe($.postcss([
      autoprefixer({ browsers: ['last 2 versions', 'ie >= 9'] })
    ]))
    .pipe(gulp.dest('css'))
    .pipe(browserSync.stream());
};

gulp.task('compress', function () {
  return pipeline(
        gulp.src('js/*.js'),
        uglify(),
        gulp.dest('js')
  );
});

function serve() {
  browserSync.init({
    server: "./"
  });

  gulp.watch("scss/*.scss", sass);
  gulp.watch("*.html").on('change', browserSync.reload);
}

gulp.task('build',
 gulp.series(sass));


gulp.task('sass', sass);
gulp.task('serve', gulp.series('sass', serve));
//gulp.task('default', gulp.series('sass', serve));
gulp.task('default', gulp.series('sass'));

gulp.task('image', function() {
  gulp.src('images/logos/*')
      .pipe(imagemin())
      .pipe(gulp.dest('images/logos'));
})
