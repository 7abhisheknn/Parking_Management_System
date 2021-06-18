<?php
/// url and time for html
$page = $_SERVER['PHP_SELF'];
$sec = "03";

/// to count session ( if not present, starting session)
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