<?php include("inc/pageHeader.php");
if ($_SESSION['USER_TYPE']=='Customer') {
    header('location:rentCar.php');
    die();
}
if ($_SESSION['IS_LOGIN'] != 'yes') {
    header('location:sign-in.php');
    die();
}

if (isset($_POST['addCar'])) {
    $vehicleModel = $_POST['vmodel'];
    $vehicleNumber = $_POST['vnumber'];
    $seatingCapacity = $_POST['seats'];
    $rentPerDay = $_POST['rent'];
    
    $user_id=$_SESSION['USER_ID'];

    $carsql = "INSERT INTO `car_master`(`agency_id`,`vehicle_model`, `vehicle_number`, `seating-capacity`, `rent_per_day`) VALUES ('$user_id','$vehicleModel','$vehicleNumber','$seatingCapacity','$rentPerDay')";
    $carresult = mysqli_query($db, $carsql);
    if ($carresult) {
        echo "<SCRIPT>
        alert('car saved');
        window.location.replace('addCar.php');
    </SCRIPT>";
    } else {
        echo "<SCRIPT>
        alert('Failed car');
        window.location.replace('addCar.php');
    </SCRIPT>";
    }
}

?>
<div id="booking" class="ride_section layout_padding pt-5 mt-4">
<h4 class="ml-3"><b>WELCOME  <span style="color:red"> <?php echo $_SESSION['USER_NAME']; ?></span> </b></h4>
      <div class="container">
        <div class="ride_main">
          <h1 class="ride_text">ADD <span style="color: #f4db31;">VEHICLE</span></h1>
        </div>
      </div>    

    <!-- ADD VEHICLE FORM -->
    <div class="container mt-4 mb-4" >
        <div class="card">
            <form class="form" action="" method="POST">
                <div class="form-row mt-4 ml-5">
                    <div class="form-group col-md-3 col-lg-3">
                            <input type="text" name="vmodel" id="v" class="form-control" placeholder="Enter Vehicle Model" required>
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                            <input type="text" name="vnumber" id="vnumber" class="form-control" placeholder="Enter Vehicle Number" required>
                    </div>
                    <div class="form-group col-md-2 col-lg-2">
                            <input type="number" name="seats" id="seats" class="form-control" placeholder="Seating Capacity"  required>
                    </div>
                    <div class="form-group col-md-2 col-lg-2">
                            <input type="number" name="rent" id="rent" class="form-control" placeholder="Rent Per Day" required>
                    </div>
                    <div class="form-group col-md-2 col-lg-2">
                        <button type="submit" name="addCar" id="addCar" class="btn btn-primary ">ADD CAR</button>
                    </div>                                    
                </div>
            </form>
        </div>
    </div>
      
      
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
                                       $user_id=$_SESSION['USER_ID'];
                                        $cardsql = "SELECT * FROM car_master WHERE agency_id='$user_id'";
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
				                                <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> || 
				                                <a href="#del<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
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