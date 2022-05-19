<?php include("inc/db.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<title>Car Rental Agency</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="icon" href="images/favicon.png" type="image/gif" />

</head>
<body>

<div id="index.php" class="header_section">
    <div class="container">
            <div class="row">
                <div class="col-sm-2 col-lg-3">
                    <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
                </div>
                <div class="col-sm-10 col-lg-9">
                    <div class="menu_text">
                    <?php if ($_SESSION['USER_TYPE'] == 'Car_Agency') { ?>
                        <!-- L3-->
                        <li><a href="addCar.php">Add Vehicle</a></li>
                        <li><a href="history.php">Rent History</a></li>                                                    
                        
                        
                    <?php } elseif ( $_SESSION['USER_TYPE'] == 'Customer' ) { ?>
                        <!-- L2-->
                        <li><a href="index.php">Home</a></li>
                        <li><a href="rentCar.php">Rent Car</a></li>  
                        <li><a href="bookDetails.php">Booked Details</a></li>
                        
                    <?php } ?>
                        
                    <li><a href="sign-out.php">Sign-out</a></li>
                   </div>
              
                </div> 
                </div>
            </div>
    </div>
</div>