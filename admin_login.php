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
        $sql="SELECT a_password FROM `admin` WHERE a_email='$email'";
        $result=mysqli_query($conn, $sql);
        $a_password=mysqli_fetch_assoc($result);
        if ($password==$a_password['a_password']){
            header('Location: admin.php');
        }
        else{
            $error['password']='wrong password';
        }

    }
}

?>

<?php include('template/header.php'); ?>

<section>
    <form action="admin_login.php" method="post" class="centre_t form_grid" id="admin_login">
        <h1>Admin Login</h1>
        <h3>Email</h3>
        <input type="text" name="email">
        <div class="error"><?php  echo htmlspecialchars($error['email']); ?></div>
        <h3>Password</h3>
        <input type="text" name="password" >
        <div class="error"><?php  echo htmlspecialchars($error['password']); ?></div>
        <div class="button_div">
            <input class="hov submit_button" type="submit" value="submit" name="submit">
            <a class="hov submit_button" href="admin_create.php" class="submit_button">Create Account</a>
        </div>
    </form>
</section>



<?php include('template/footer.php'); ?>