<?php include("inc/pageHeader.php");
if ($user_type=='Customer') {
    header('location:bookDetails.php');
    die();}
?>

<!-- CAR AGENCY VIEW RENT DETAILS -->

<div id="booking" class="ride_section layout_padding pt-5">
    
<h4 class="ml-3 "><b>WELCOME  <span style="color:red"> <?php echo $_SESSION['USER_NAME']; ?></span> </b></h4>
      <div class="container">
        <div class="ride_main">
          <h1 class="ride_text">RENT CAR <span style="color: #f4db31;">HISTORY</span></h1>
        </div>
       </div>    

      
    <div class="row mt-4">
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
                                     <th>Customer Name</th>
                                     <th>Rent Start Date</th>
                                     <th>Total Days</th>
                                     <th>Total Cost</th>
                                    
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php                                                        
                                $user_id=$_SESSION['USER_ID'];
                                 $cardsql = "SELECT * FROM rent_car_details WHERE agency_id='$user_id'" ;
                                 $cardresult = mysqli_query($db, $cardsql) or die(mysqli_error($db));;
                                 $sr = 1;
                                 while ($row = mysqli_fetch_array($cardresult)) {
                                 ?>
                                     <tr>
                                         <td><?php echo $sr ?></td>
                                         <td><?php echo $row['vehicle_model'] ?></td>
                                         <td><?php echo $row['vehicle_number'] ?></td>
                                         <td><?php echo $row['username'] ?></td>
                                         <td><?php echo $row['startDate'] ?></td>
                                         <td><?php echo $row['total_days'] ?></td>
                                         <td><?php echo $row['totalCost'] ?></td> 
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