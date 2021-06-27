
<!-- https://www.youtube.com/watch?v=zpTlJ6dtOxA&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=25
watch above youtube to make new username and password from xampp -->

<?php 
// to connect to mysql using host   user    password       database
$conn = mysqli_connect('localhost','abhi','abhi_localhost','pms');
if (!$conn){
    echo 'Connection error'.mysqli_connect_error();
}

?>