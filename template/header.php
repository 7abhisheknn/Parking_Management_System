
<?php
/// getting name from session to display in navigation bar
$name=$_SESSION['name']??'Guest';

/// loging out when clicked on logout in navigation bar
if(isset($_GET['LOGOUT'])){
    session_unset();
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/park.png"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="container">
    <nav>
    <ul>
    <li><img src="img/park.png" alt="no favicon image found"></li>
    <li><a class="hov" href="index.php">Home</a></li>
    <li><a class="hov" href="customer_login.php">Customer</a></li>
    <li><a class="hov" href="admin_login.php">Admin</a></li>
    <li><a class="hov" target="_blank" href="https://github.com/7abhisheknn/Parking_Management_System">About Us</a></li>
    <li id="name">Hello <?php echo $name; ?></li>
<!-- /// displaying logout when user is not guest -->
    <?php if ($name!="Guest"){ ?>
        <li><a id="logout" href="<?php echo $_SERVER['PHP_SELF']; ?>?LOGOUT=1">LOGOUT</a></li>
    <?php } ?>
    </ul>
    </nav>
    
