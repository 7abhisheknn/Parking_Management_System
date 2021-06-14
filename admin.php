<?php
session_start();

if (empty($_SESSION['a_id'])){
    header('Location: admin_login.php');
}

?>

<?php include('template/header.php'); ?>
<section>
<h1>admin page</h1>
<div class="border_red">parking locations

</div>
<div class="border_red">previously parked bills

</div>


</section>
<?php include('template/footer.php'); ?>

