<?php
include('configuration/database_config.php');

/// checking if admin id is present else redirecting to admin_login
session_start();
if (empty($_SESSION['a_id'])){
    header('Location: admin_login.php');
}

/// getting details of all previous bills for admin
$a_id = mysqli_real_escape_string($conn, $_SESSION['a_id']);
$sql="SELECT b.v_no, b.b_price,b.b_from, b.b_till,c.c_name,c.c_email,c.c_address FROM place as p, admin as a, bill as b, customer as c, vehicle as v WHERE b.p_id=p.p_id AND b.a_id=a.a_id AND b.v_no=v.v_no AND v.c_id=c.c_id AND b.a_id='$a_id'";
$result=mysqli_query($conn,$sql);
$bills=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>

<?php include('template/header.php'); ?>
<section>
<h1>admin page</h1>
<div >parking locations

</div>
<div >
<h1>Previous Parking Bills</h1>
<table class="centre_t">
<thead>
    <tr>
        <th>Vehicle No</th>
        <th>Price</th>
        <th>From</th>
        <th>Till</th>
        <th>Customer Name</th>
        <th>Customer Email</th>
        <th>Customer Address</th>

    </tr>
</thead>
<tbody>
<?php foreach ($bills as $bill) {?>
    <div class="centre_t">
    <tr>
        <td><?php echo htmlspecialchars($bill['v_no']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['b_price']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['b_from']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['b_till']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['c_name']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['c_email']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['c_address']) ; ?></td>

    </tr>
    </div>
</tbody>
<?php  }  ?>
</table>
</div>


</section>
<?php include('template/footer.php'); ?>

