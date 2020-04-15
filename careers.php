<?php 
    require_once 'load.php';

    $displayJobs= showAllJobs();

    if(!$displayJobs){
        $message = 'Failed to get list of jobs.';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Ippolito Group | Careers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="https://kit.fontawesome.com/5a7dc109cc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <div class="grid-container full" id="top" data-magellan-target="top">

        <div class="hero-full-screen">

            <div class="top-content-section">
              
              <div class="title-bar" data-responsive-toggle="main-navigation" data-hide-for="medium">
                <div class="title-bar-left"><a class="menu-text logo" href="index.php">Ippolito Group</a></div>
                    <div class="title-bar-right"><button class="menu-icon" type="button" data-toggle="main-navigation"></button></div>
              </div>
              
              <div class="top-bar" id="main-navigation">
                <div class="top-bar-left">
                  <a class="menu-text logo hide-for-small-only" href="index.php">Ippolito Group</a>
                </div>
                <div class="top-bar-right">
                  <ul class="dropdown menu nav" data-dropdown-menu data-magellan data-alignment="auto">
                    <li><a href="index.php">HOME</a></li>
                    <li>
                      <a href="#">ABOUT</a>
                      <ul class="menu vertical" data-magellan>
                        <li><a href="index.html#products-section">WHAT WE DO</a></li>
                        <li><a href="index.html#customers">WHO WE SERVE</a></li>
                        <li class="is-dropdown-submenu-parent">
                          <a href="index.html#companies">OUR COMPANIES</a>
                          <ul class="menu" data-magellan>
                            <li><a href="index.html#fruitproduce">IPPOLITO FRUIT &amp; PRODUCE</a></li>
                            <li><a href="index.html#international">IPPOLITO INTERNATIONAL</a></li>
                            <li><a href="index.html#produce">IPPOLITO PRODUCE</a></li>
                            <li><a href="index.html#transportation">IPPOLITO TRANSPORTATION</a></li>
                          </ul>
                        </li>
                        <li><a href="index.html#history-section">OUR HISTORY</a></li>
                      </ul>
                    </li>
                    <li><a href="contact.html">CONTACT</a></li>
                    <li><a href="careers.php" class="careers">CAREERS</a></li>
                  </ul>
                </div>
              
              </div>
            </div>
    
            <div class="middle-content-section">
              <h1>Careers At Ippolito</h1>
              <hr class="show-for-small-only">
              <p>While we have evolved into a large, vertically-integrated group of companies spanning North America, we are proud to have kept the family values that we started with and that have got us to where we are. If you are interested in joining a dynamic team and helping us create the future, check out the testimonials and opportunities below.</p>
            </div>
          
            <div class="bottom-content-section" data-magellan data-threshold="0">
              <a href="#main-content-section"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-18.005-1.568l1.415-1.414 4.59 4.574 4.579-4.574 1.416 1.414-5.995 5.988-6.005-5.988z"/></svg></a>
            </div>

    </div>
    

    <div id="main-content-section" data-magellan-target="main-content-section">
        
        <div class="grid-x grid-padding-x" id="careers-header">
            <div class="large-12 cell">
                <h1>Join The Ippolito Group of Companies</h1>
                <h3>View our open opportunities below:</h3>
            </div>
        </div>

        <div class="grid-x grid-padding-x">
        <div class="large-3 cell" id="openings-table">
        <?php echo !empty($message) ? $message : ''; ?>
            <table class="unstriped stack">
                <thead>
                  <tr>
                    <th width="250">Open Positions</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($row = $displayJobs->fetch(PDO::FETCH_ASSOC)):?>
    <tr>
        <td><?php echo '<a class="job" href="'.$row['job_url'].'">'.$row['job_name'].'</a>'?></td>
    </tr>
    <?php endwhile;?>
                </tbody>
              </table>
        </div>
    </div>

        <div class="grid-x">
            <div class="cell">
              <footer>
                <p>Copyright &copy; 2020 Ippolito Group of Companies</p>
                <hr>
                <ul class="menu" data-magellan>
                  <li><a href="careers.php">Careers</a></li>
                  <li><a href="#top">Back To Top <i class="fas fa-angle-up"></i></a></li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
                <ul class="menu icons">
                  <li><a href="https://www.linkedin.com/company/ippolitogroup"><i class="fab fa-linkedin"></i></a></li>
                  <li><a href="https://www.instagram.com/theippolitogroup/"><i class="fab fa-instagram"></i></a></li>
                  <li><a href="https://www.facebook.com/IppolitoGroup"><i class="fab fa-facebook"></i></a></li>
                  <li><a href="https://twitter.com/IppolitoGroup"><i class="fab fa-twitter"></i></a></li>
                </ul>
              </footer>
            </div>
          </div>
    
    
    </div>
</div>

    

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/what-input/dist/what-input.js"></script>
    <script src="node_modules/foundation-sites/dist/js/foundation.js"></script>
    <script src="js/app.js"></script>
</body>
</html>