<?php
include('configuration/database_config.php');
session_start();

if (empty($_SESSION['c_id'])){
    header('Location: customer_login.php');
}
$c_id = mysqli_real_escape_string($conn, $_SESSION['c_id']);

$sql="SELECT b.v_no,b.b_from, b.b_till, b.b_price,a.a_company_name,a.a_email, a.a_country, a.a_state, a.a_district, a.a_address, a.a_pincode FROM place as p, admin as a, bill as b, customer as c, vehicle as v WHERE b.p_id=p.p_id AND b.a_id=a.a_id AND b.v_no=v.v_no AND v.c_id=c.c_id AND v.c_id='$c_id'";
$result=mysqli_query($conn,$sql);
$bills=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>


<?php include('template/header.php'); ?>
<section>
<h1>customer page</h1>
<div class="border_red">current parking locations

</div>
<div class="border_red">
<h1>previously parked bills</h1>
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
        <td><?php echo htmlspecialchars($bill['v_no']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['b_from']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['b_till']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['b_price']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['a_company_name']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['a_email']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['a_country']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['a_state']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['a_district']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['a_address']) ; ?></td>
        <td><?php echo htmlspecialchars($bill['a_pincode']) ; ?></td>

    </tr>
    </div>
</tbody>
<?php  }  ?>
</table>
</div>


</section>
<?php include('template/footer.php'); ?>