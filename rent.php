<!-- RENT CAR DETAILS INSERT DATABASE-- >
<?php
	include('inc/db.php');
	session_start();

	$username=$_SESSION['USER_NAME'];
	$cust_id=$_SESSION['USER_ID'];	
	$startDate=$_POST['startDate'];
	$tdays=$_POST['totalDays'];
	
	
	$car_id=$_GET['id'];
	$row=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM car_master WHERE id ='$car_id'"));
    $agency_id=$row['agency_id'];
	$vehicle_model=$row['vehicle_model'];
	$vehicle_number=$row['vehicle_number'];
	$rent=$row['rent_per_day'];
	$tCost=$rent*$tdays;

  ?> 
  <?php
	
	mysqli_query($db,"INSERT INTO `rent_car_details`(`agency_id`,`car_id`,`customer_id`,`username`,`startDate`,`total_days`, `totalCost`, `vehicle_model`, `vehicle_number`) VALUES ('$agency_id','$car_id','$cust_id','$username','$startDate','$tdays','$tCost','$vehicle_model','$vehicle_number')");
	mysqli_query($db,"UPDATE car_master SET status='booked' WHERE id='$car_id' ");
	header('location:bookDetails.php');
    
?>