<!-- EDIT VEHICLE DETAILS -->
<?php
	include('inc/db.php');
	
	$id=$_GET['id'];
	
	$model=$_POST['emodel'];
	$number=$_POST['enumber'];
	$seats=$_POST['eseats'];
	$rent=$_POST['erent'];
	
	mysqli_query($db,"UPDATE `car_master` SET `vehicle_model`='$model',`vehicle_number`='$number',`seating-capacity`='$seats',`rent_per_day`='$rent' where id='$id'");
	header('location:addCar.php');
    
?>