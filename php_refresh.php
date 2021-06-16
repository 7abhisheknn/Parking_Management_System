<?php
$page = $_SERVER['PHP_SELF'];
$sec = "03";

session_start();
if(empty($_SESSION["refreshed_round"])){
    $_SESSION["refreshed_round"]=0;
}
$_SESSION["refreshed_round"]++;
echo "User refreshed: " . $_SESSION["refreshed_round"];


?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>

    </body>
</html>