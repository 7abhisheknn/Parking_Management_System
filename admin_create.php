<?php
include('configuration/database_config.php');
$error = array('Email'=>'','Your_Password'=>'','Retype_Password'=>'','Name'=>'','Company_Name'=>'','Country'=>'','State'=>'','District'=>'','Address'=>'','Pincode'=>'');

$form= array();


$arr=array('Email','Your_Password','Retype_Password','Name','Company_Name','Country','State','District','Address','Pincode');


if(isset($_POST['submit'])){
    if(empty($_POST['Email'])){
        $error['Email']='provide Email';
    }
    else{
        $Email=$_POST['Email'];
        if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
            $error['Email']='enter a valid Email address';   
        }
    }
    for ($i=1; $i < count($arr); $i++) { 
        if (empty($_POST[$arr[$i]])){
            $error[$arr[$i]]='provide '.$arr[$i];
        }
    }
    if (empty($error['Your_Password']) and empty($error['Retype_Password']) and $_POST['Your_Password']!=$_POST['Retype_Password']){
        $error['Your_Password']='';
        $error['Retype_Password']='Passwords not Matching';
    }
    if(!array_filter($error)){
        for ($i=0; $i < count($arr); $i++) { 
            array_push($form,mysqli_real_escape_string($conn, $_POST[$arr[$i]]));
        }
        $sql = "INSERT INTO `admin` (a_email,a_password,a_name,a_company_name,a_country,a_state,a_district,a_address,a_pincode) VALUES('$form[0]','$form[1]','$form[3]','$form[4]','$form[5]','$form[6]','$form[7]','$form[8]','$form[9]')";

        if(mysqli_query($conn, $sql)){
            header('Location: admin_login.php');
        } else {
            echo 'query error: '. mysqli_error($conn);
        }
    }

}

?>

<?php include('template/header.php'); ?>
<section>
    <form action="admin_create.php" method="post" class="centre_t form_grid" id="admin_create">
        <h1>Create Admin Account</h1>
        <?php for ($i=0; $i < count($arr); $i++) { ?>
            <h3><?php echo $arr[$i]; ?></h3>
            <input type="text" name="<?php echo $arr[$i]; ?>">
            <div class="error"><?php  echo htmlspecialchars($error[$arr[$i]]); ?></div>
        <?php } ?>
        <div class="button_div">
            <input class="hov submit_button" type="submit" value="submit" name="submit">
        </div>
    </form>
</section>


<?php include('template/footer.php'); ?>