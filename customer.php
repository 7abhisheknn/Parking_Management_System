<?php
session_start();

if (empty($_SESSION['c_id'])){
    header('Location: customer_login.php');
}
?>


<?php include('template/header.php'); ?>
<section>
<h1>customer page</h1>
<div class="border_red">current parking locations

</div>
<div class="border_red">previously parked bills

</div>


</section>
<?php include('template/footer.php'); ?>