
<?php include("inc/db.php"); ?>
<?php include("server.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">


    <!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">    
    <!-- Style -->
    <link rel="stylesheet" href="css/styleLogin.css">

    <title>Car Rental Agency</title>
  </head>
  <body>
  

  <div class="d-md-flex half">
    <div class="bg" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3 class="text-uppercase">Register <strong>Car Rental Agency</strong></h3>
              </div>
              <form action="#" method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Enter Username" id="username" required>
                </div>
                <div class="form-group first">
                  <label for="useremail">User Email</label>
                  <input type="text" name="useremail" class="form-control" placeholder="your-email@gmail.com" id="useremail" required>
                  <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                </div>
                <div class="form-group first">
                  <label for="usertype">User Type</label>
                  <select name="usertype" class="form-control" id="usertype" required>
                      <option hidden value=" "> -- Select User Type --</option>
                      <option value="Car_Agency">Car Agency</option> 
                      <option value="Customer">Customer</option> 
                  </select>
                </div>                
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" name="password" id="password">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" id="cpassword">
                  <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  
                 <div class="control__indicator"></div>
                  </label>
                  <span></span> 
                </div>

                <input type="submit" value="Register" name="register_btn" class="btn btn-block py-2 btn-success"><br>

                <p class="text-center">Already have an account? <a href="sign-in.php">Log In</a></p>
                
                
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>