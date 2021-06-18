<?php
include('configuration/database_config.php');

/// if park clicked redirecting to customer_login with parking id
if(isset($_GET['c_p_id'])){
    session_start();
    $_SESSION['c_p_id']=$_GET['c_p_id'];
    header('Location: customer_login.php');
}

/// getting places details to display
$sql='SELECT p.p_id, p.a_id, p.p_price, p.p_from, p.p_till, p.v_no, a.a_email, a.a_name, a.a_company_name,a.a_email, a.a_country, a.a_state, a.a_district, a.a_address, a.a_pincode FROM place as p, admin as a WHERE p.a_id=a.a_id AND p.v_no IS NULL';
$result=mysqli_query($conn,$sql);
$places=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

?>

<?php include('template/header.php'); ?>
<section>
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
        <th>Park Here</th>
    </tr>
</thead>
<tbody>
<?php foreach ($places as $place) {?>
    <div class="centre_t">
    <tr>
        <td><?php echo htmlspecialchars($place['a_company_name']) ; ?></td>
        <td><?php echo htmlspecialchars($place['a_email']) ; ?></td>
        <td><?php echo htmlspecialchars($place['p_price']) ; ?></td>
        <td><?php echo htmlspecialchars($place['a_country']) ; ?></td>
        <td><?php echo htmlspecialchars($place['a_state']) ; ?></td>
        <td><?php echo htmlspecialchars($place['a_district']) ; ?></td>
        <td><?php echo htmlspecialchars($place['a_pincode']) ; ?></td>
        <td><a class="park_here" href="index.php?c_p_id=<?php echo $place['p_id']; ?>">PARK</a></td>
    </tr>
    </div>
<?php  }  ?>
</tbody>
</table>

</section>
<?php include('template/footer.php'); ?>