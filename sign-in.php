
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
                <h3 class="text-uppercase">Login to <strong>Car Rental Agency</strong></h3>
              </div>
              <?php include("errors.php"); ?>
              <form action="#" method="post">
                <div class="form-group first">
                  <label for="useremail">User Email</label>
                  <input type="email" class="form-control" name='user_email' placeholder="your-email@gmail.com" id="username" required>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Your Password" id="password" required>
                </div>
                
                <div class="d-sm-flex mb-3 align-items-center">
                  
                    <div class="control__indicator"></div>
                  </label>
                 
                </div>

                <input type="submit" value="Log In" name="login_btn" class="btn btn-block py-2 btn-warning">
                <br>
                <p class="text-center">Don’t have an account? <a href="register.php">Register</a></p>
                
                
                
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