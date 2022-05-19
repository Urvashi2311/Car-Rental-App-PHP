<?php include("inc/pageHeader.php"); 
$user_type=$_SESSION['USER_TYPE'];
if (!isset($_SESSION['IS_LOGIN']) && $user_type='Car_Agency') {
    header('location:sign-in.php');
    die();
}
if ($user_type=='Car_Agency') {
    header('location:addCar.php');
    die();
}

?>
<div id="booking" class="ride_section layout_padding">
    
<h4 class="ml-3"><b>WELCOME  <span style="color:red"> <?php echo $_SESSION['USER_NAME']; ?></span> </b></h4>
      <div class="container">
        <div class="ride_main">
          <h1 class="ride_text">RENT <span style="color: #f4db31;">NOW</span></h1>
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
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $cardsql = "SELECT * FROM car_master WHERE status='not booked'";
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
                                          <td>
                                              <a href="#rent<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-success"><span class="glyphicon glyphicon-trash"></span> RENT CAR</a>
	                          <?php include('modal.php'); ?>
	                           </td>
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