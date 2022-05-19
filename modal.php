<!-- Delete CAR DETAILS MODDAL -->
<div class="modal fade" id="del<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                   
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($db,"select * from car_master where id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5>Are you sure to delete <strong><?php echo ucwords($drow['vehicle_model'].' '.$row['vehicle_number']); ?></strong> from the list?</h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit CAR DETAILS MODAL -->
    <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($db,"select * from car_master where id='".$row['id']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit.php?id=<?php echo $erow['id']; ?>">
					<div class="row">
						<div class="col-lg-4">
							<label style="position:relative; top:7px;">Vehicle Model:</label>
						</div>
						<div class="col-lg-8">
							<input type="text" name="emodel" class="form-control" value="<?php echo $erow['vehicle_model']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label style="position:relative; top:7px;">Vehicle Number:</label>
						</div>
						<div class="col-lg-8">
							<input type="text" name="enumber" class="form-control" value="<?php echo $erow['vehicle_number']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label style="position:relative; top:7px;">Seating Capacity</label>
						</div>
						<div class="col-lg-8">
							<input type="text" name="eseats" class="form-control" value="<?php echo $erow['seating-capacity']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label style="position:relative; top:7px;">Rent per Day</label>
						</div>
						<div class="col-lg-8">
							<input type="text" name="erent" class="form-control" value="<?php echo $erow['rent_per_day']; ?>">
						</div>
					</div>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->


<!--  Rent Car -->
    <div class="modal fade" id="rent<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($db,"select * from car_master where id='".$row['id']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="rent.php?id=<?php echo $erow['id']; ?>">
					<div class="row">
						<div class="col-lg-6">
							<label style="position:relative; top:7px;">Vehicle Model: <span style="color:red;"> <?php echo $erow['vehicle_model']; ?> </span></label>
						</div>						
					
						<div class="col-lg-6">
							<label style="position:relative; top:7px;">Vehicle Number: <span style="color:red;"> <?php echo $erow['vehicle_number']; ?> </span></label>
						</div>						
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-6">
							<label style="position:relative; top:7px;">Seating Capacity : <span style="color:red;"> <?php echo $erow['seating-capacity']; ?> </span></label>
						</div>	
						<div class="col-lg-6">
							<label style="position:relative; top:7px;">Rent Per Day <span style="color:red;"> <?php echo $erow['rent_per_day']; ?> </span></label>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
					<div class="col-lg-4">
							<label style="position:relative; top:7px;">Rent Start Date : </label>
						</div>


						<div class="col-lg-8">
							<input type="date" name="startDate" id="startDate" class="form-control">
						</div>
						
					</div>
					<div style="height:10px;"></div>
					<div class="row">
					<div class="col-lg-4">
							<label style="position:relative; top:7px;">Rent Total Days : </label>
						</div>
						<div class="col-lg-8">
						<input type="number" id="totalDays" name="totalDays" class="form-control" placeholder="Enter Total Rent Days">
						</div>
					</div>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Rent Now</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->

