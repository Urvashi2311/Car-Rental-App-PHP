<?php include("inc/db.php");
session_start();

    // UPDATE RENT CAR STATUS AFTER BOOKING DATE FINISHES
     $current_date=date('Y-m-d');
     $result=mysqli_query($db,"SELECT * FROM rent_car_details ORDER BY rent_id DESC");
     while ($row = mysqli_fetch_array($result)) {
     $start_date=$row['startDate'];
     $tdays=$row['total_days'];
     $car_id=$row['car_id'];
     $finish_date=date('Y-m-d', strtotime($start_date. ' + '.$tdays.'  days'));
     
     if(strtotime($finish_date) < strtotime($current_date))
     {  
       mysqli_query($db,"UPDATE car_master set `status`='not booked' where id='$car_id'");}
       break;
     }
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
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

</head>
<body>
	<!--header section start -->
    <div id="index.php" class="header_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
                </div>
                <div class="col-sm-6 col-lg-9">
                    <div class="menu_text">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#booking">Booking</a></li>
                            <li><a href="sign-out.php">Login</a></li>
                    </div>  
                
                        </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- header section end -->
   
    <div class="banner_section">
      <div class="container-fluid">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row">
          <div class="col-md-6">
            <div class="book_now">
              <h1 class="book_text">BOOK NOW</h1>
              <h1 class="call_text">(+71) 1234567890</h1>
            </div>
            <div class="image_1"><img src="images/img-1.png"></div>
          </div>
           <div class="col-md-6">
            <h1 class="booking_text">Book a Car to your destination in town</h1>
            
            <div class="contact_bg">
            <div class="input_main">
              <div class="container">
                <h2 class="request_text">Your everyday travel partner</h2>
                <form action="/action_page.php">
                <div class="form-group">
                  <input type="text" class="email-bt" placeholder="PICKUP" name="Name" readonly>
                </div>
                <div class="form-group">
                  <input type="text" class="email-bt" placeholder="DROP" name="Email" readonly>
                </div>
                <div class="form-group">
                  <input type="text" class="email-bt" placeholder="WHEN" name="Email" readonly>
                </div>
                  </form>
                  </div> 
                  </div>
                <div class="send_bt"><a href="#">SEARCH</a></div>
          </div>
          </div>
        </div>
        </div>
    </div>
    </div>
  </div>
</div>
    
    <!-- why ride section start -->
    <div id="booking" class="ride_section layout_padding">
      <div class="container">
        <div class="ride_main">
          <h1 class="ride_text">BOOK <span style="color: #f4db31;">NOW</span></h1>
      </div>
        </div>
    </div>
    <div class="ride_section_2 layout_padding">
      <div class="container">
        <div class="row">
              <div class="col-xl-12">
                  <div class="card">                                         
                    
                      <div class="card-block table-border-style">
                          <div class="table-responsive">
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th>S. No.</th>
                                          <th>Vehicle Model</th>
                                          <th>Vehicle Number</th>
                                          <th>Seating Capacity</th>
                                          <th>Rent Per Day</th>
                                          <th>Rent</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      $cardsql = "SELECT * FROM car_master where status='not booked'";
                                      $cardresult = mysqli_query($db, $cardsql) or die(mysqli_error($db));;
                                      $sr = 1;
                                      while ($row = mysqli_fetch_array($cardresult)) {
                                      ?>
                                          <tr>
                                              <td><?php echo $sr ?></td>
                                              <td><?php echo $row['vehicle_model'] ?></td>
                                              <td><?php echo $row['vehicle_number'] ?></td>
                                              <td><?php echo $row['seating-capacity'] ?></td>
                                              <td><?php echo $row['rent_per_day'] ?></td>                                                                
                                              <td><a href="sign-in.php"  class="btn btn-warning"> RENT</a></td>
                                          </tr>
                                   <?php $sr++;
                                      }
                                      ?>
                                  </tbody>
                              </table>
                            </div>
                    </div>
            </div>
        </div>
      </div>
    </div>
</div>
   
<?php include("inc/pageFooter.php"); ?>