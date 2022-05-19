<!-- DELETE VEHICLE DETAILS -->
<?php
	include('inc/db.php');
	$id=$_GET['id'];
	mysqli_query($db,"delete from car_master where id='$id'");
	header('location:addCar.php');
?>