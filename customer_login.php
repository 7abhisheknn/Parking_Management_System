<?php
include('configuration/database_config.php');
$error = array('email'=>'','password'=>'');



if(isset($_POST['submit'])){
    if(empty($_POST['email'])){
        $error['email']='provide email';
    }
    else{
        $email=$_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error['email']='enter a valid email address';   
        }
    }
    if(empty($_POST['password'])){
        $error['password']='provide password';
    }
    else{
        $password=$_POST['password'];
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sql="SELECT c_password FROM `customer` WHERE c_email='$email'";

        $result=mysqli_query($conn, $sql);
        $c_password=mysqli_fetch_assoc($result);
        if ($password==$c_password['c_password']){
            header('Location: customer.php');
        }
        else{
            $error['password']='wrong password';
        }

    }
}

?>

<?php include('template/header.php'); ?>

<section>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="centre_t form_grid">
        <h1>Customer Login</h1>
        <h3>Email</h3>
        <input type="text" name="email">
        <div class="error"><?php  echo htmlspecialchars($error['email']); ?></div>
        <h3>Password</h3>
        <input type="text" name="password" >
        <div class="error"><?php  echo htmlspecialchars($error['password']); ?></div>
        <div class="button_div">
            <input class="hov submit_button" type="submit" value="submit" name="submit">
            <a class="hov submit_button" href="customer_create.php" class="submit_button">Create Account</a>
        </div>
    </form>
</section>



<?php include('template/footer.php'); ?>