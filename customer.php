<?php
include('configuration/database_config.php');
/// checking if customer id is present else redirecting to customer_login
session_start();
if (empty($_SESSION['c_id'])){
    header('Location: customer_login.php');
}
$c_id=mysqli_real_escape_string($conn, $_SESSION['c_id']);

/// if confirm park submit is pressed updating parking,vehicle,bill 
if(isset($_POST['confirm_park'])){
    $p_id=mysqli_real_escape_string($conn, $_POST['p_id']);
    $a_id=mysqli_real_escape_string($conn, $_POST['a_id']);
    $b_price=mysqli_real_escape_string($conn, $_POST['b_price']);
    $from=mysqli_real_escape_string($conn, $_POST['from']);
    $till=mysqli_real_escape_string($conn, $_POST['till']);
    $v_no=mysqli_real_escape_string($conn, $_POST['v_no']);
    $sql="UPDATE `place` SET v_no='$v_no',p_from='$from',p_till='$till' WHERE p_id='$p_id'; ";
    mysqli_query($conn,$sql);
    $sql="INSERT INTO `vehicle` (`v_no`, `c_id`, `v_type`) SELECT '$v_no', '$c_id', 'car' WHERE NOT EXISTS (SELECT * FROM `vehicle` WHERE v_no='$v_no') ";
    mysqli_query($conn,$sql);
    $sql="INSERT INTO `bill` (p_id,a_id,v_no,b_price,b_from,b_till) VALUES('$p_id','$a_id','$v_no','$b_price','$from','$till')";
    mysqli_query($conn,$sql);
    $_SESSION['c_p_id']="";
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
}

/// if parking id present getting the details of congfirm park location
$place="";
if(!empty($_SESSION['c_p_id'])){
    $p_id = mysqli_real_escape_string($conn, $_SESSION['c_p_id']);
    $sql="SELECT p.p_id, p.a_id, p.p_price, p.p_from, p.p_till, p.v_no, a.a_email, a.a_name, a.a_company_name,a.a_email, a.a_country, a.a_state, a.a_district, a.a_address, a.a_pincode FROM place as p, admin as a WHERE p.a_id=a.a_id AND p.p_id='$p_id' AND p.v_no IS NULL ";
    // AND p.v_no IS NULL not need 
    $result=mysqli_query($conn,$sql);
    $place=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
}

/// for displaying current parked locations
//+ in process 
$sql="SELECT p.v_no,p.p_from, p.p_till, p.p_price,a.a_company_name,a.a_email, a.a_country, a.a_state, a.a_district, a.a_address, a.a_pincode FROM place as p, admin as a, customer as c, vehicle as v WHERE p.a_id=a.a_id AND p.v_no=v.v_no AND v.c_id=c.c_id AND c.c_id=$c_id";
$result=mysqli_query($conn,$sql);
$current_places=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
$c_p_k=array('v_no','p_from','p_till','p_price','a_company_name','a_email','a_country','a_state','a_district','a_address','a_pincode');


/// getting details of all previous bills for customer
// $_SESSION['c_id']="";
// echo $c_id;
// $c_id="!=NULL";
$sql="SELECT b.v_no,b.b_from, b.b_till, b.b_price,a.a_company_name,a.a_email, a.a_country, a.a_state, a.a_district, a.a_address, a.a_pincode FROM place as p, admin as a, bill as b, customer as c, vehicle as v WHERE b.p_id=p.p_id AND b.a_id=a.a_id AND b.v_no=v.v_no AND v.c_id=c.c_id AND v.c_id=$c_id";
$result=mysqli_query($conn,$sql);
$bills=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
$bill_k=array('v_no','b_from','b_till','b_price','a_company_name','a_email','a_country','a_state','a_district','a_address','a_pincode');

?>


<?php include('template/header.php'); ?>
<section>
<h1>customer page</h1>

<?php if (!empty($place)){?>
<div><h1>confirm parking</h1>
<table class="centre_t">
<thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Price</th>
        <th>Country</th>
        <th>State</th>
        <th>District</th>
        <th>Pincode</th>
        <th>From</th>
        <th>Till</th>
        <th>Vehicle No</th>
        <th></th>
    </tr>
</thead>
<tbody>
    <div class="centre_t">
    <tr>
        <td class="data"><?php echo htmlspecialchars($place['a_company_name']) ; ?></td>
        <td class="data"><?php echo htmlspecialchars($place['a_email']) ; ?></td>
        <td class="data"><?php echo htmlspecialchars($place['p_price']) ; ?></td>
        <td class="data"><?php echo htmlspecialchars($place['a_country']) ; ?></td>
        <td class="data"><?php echo htmlspecialchars($place['a_state']) ; ?></td>
        <td class="data"><?php echo htmlspecialchars($place['a_district']) ; ?></td>
        <td class="data"><?php echo htmlspecialchars($place['a_pincode']) ; ?></td>
        <form action="customer.php" method="post">
        <td><input type="datetime-local" name="from" id=""></td>
        <td><input type="datetime-local" name="till" id=""></td>
        <td><input type="text" name="v_no" ></td>
        <input type="hidden" name="p_id" value="<?php echo $place['p_id']; ?>">
        <input type="hidden" name="a_id" value="<?php echo $place['a_id']; ?>">
        <input type="hidden" name="b_price" value="<?php echo $place['p_price']; ?>">
        <td><input type="submit" name="confirm_park" value="confirm_park" ></td>
        </form>
    </tr>
    </div>
</tbody>
</table>
</div>
<?php } ?>


<div>
<h1>current parking locations</h1>
<table class="centre_t">
<thead>
    <tr>
        <th>Vehicle No</th>
        <th>From</th>
        <th>Till</th>
        <th>Price</th>
        <th>Company Name</th>
        <th>Company Email</th>
        <th>Country</th>
        <th>State</th>
        <th>District</th>
        <th>Address</th>
        <th>Pincode</th>
    </tr>
</thead>
<tbody>
<?php foreach ($current_places as $place) {?>
    <div class="centre_t">
    <tr>
        <?php foreach($c_p_k as $k) {?>
            <td class="data"><?php echo htmlspecialchars($place[$k]) ; ?></td>
        <?php } ?>
    </tr>
    </div>
</tbody>
<?php  }  ?>
</table>
<h1>current parking locations</h1>
</div>



<div >
<h1>previously parked bills</h1>
<?php if(!empty($bills)) { ?>

<table class="centre_t">
<thead>
    <tr>
        <th>Vehicle No</th>
        <th>From</th>
        <th>Till</th>
        <th>Price</th>
        <th>Company Name</th>
        <th>Company Email</th>
        <th>Country</th>
        <th>State</th>
        <th>District</th>
        <th>Address</th>
        <th>Pincode</th>
    </tr>
</thead>
<tbody>
<?php foreach ($bills as $bill) {?>
    <div class="centre_t">
    <tr>
        <?php foreach($bill_k as $k) {?>
            <td class="data"><?php echo htmlspecialchars($bill[$k]) ; ?></td>
        <?php } ?>
    </tr>
    </div>
</tbody>
<?php  }  ?>
</table>
<?php } else { ?>
<h3>no previous bill data found</h3>
<?php } ?>
</div>

</section>
<?php include('template/footer.php'); ?>