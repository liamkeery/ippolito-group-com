  <?php
require_once '../load.php';

$ip = $_SERVER['REMOTE_ADDR'];

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        // Log user in
        $message = login($username, $password, $ip);
    } else {
        $message = "<p class='error'>Please fill out the required fields.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ippolito Admin</title>
    <link rel="stylesheet" href="../css/app.css">
    <script src="https://kit.fontawesome.com/5a7dc109cc.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="grid-container">
    <h1 class="login-heading">Admin Login</h1>
    <?php echo !empty($message) ? $message : ''; ?>
    <form action="admin_login.php" method="post" class="login">
    <div class="grid-x">
    <input type="text" name="username" id="username" value="" placeholder="Username" class="cell large-3">
    </div>
    <div class="grid-x">
    <input type="password" name="password" id="password" value="" placeholder="Password" class="cell large-3">
    </div>
    <div class="grid-x align-center">
    <button class="button large-3 cell" name="submit">Login</button>
    <div>
     </form>
     </div>
     

    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/what-input/dist/what-input.js"></script>
    <script src="../node_modules/foundation-sites/dist/js/foundation.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>