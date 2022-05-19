<?php
include('inc/db.php');

session_start();
$errors = array();



// LOGIN USER

if (isset($_POST['login_btn'])) {

    $email = mysqli_real_escape_string($db, $_POST['user_email']);
    $password =mysqli_real_escape_string($db, $_POST['password']);
 


        $loginQuery = "SELECT * FROM user_login WHERE user_email='$email' AND BINARY password='$password'";
        $loginResults = mysqli_query($db, $loginQuery);
        $loginFetch = mysqli_fetch_assoc($loginResults);

        if (mysqli_num_rows($loginResults)) {
                $_SESSION['IS_LOGIN'] = 'yes';
                $_SESSION['ID'] = $loginFetch['id'];
                $_SESSION['USER_NAME'] =$loginFetch['username'];
                $_SESSION['EMAIL'] = $loginFetch['user_email'];
                $_SESSION['USER_TYPE'] = $loginFetch['user_type'];
                $_SESSION['USER_ID'] = $loginFetch['user_id'];
    
                $accessLevel = $_SESSION['USER_TYPE'];
                if ($accessLevel == 'Car_Agency'){
                    header("location: addCar.php");
                    die();
                } else if ($accessLevel == 'Customer') {
                    header("location: rentCar.php");
                    die();
                }
                
            } 
         else {
            array_push($errors, "Wrong username/password combination. Please try again");
        }
    
    }
// REGISTER USER


if(isset($_SESSION['user_id'])!="") {
    header("Location: index.php");
  }

    if (isset($_POST['register_btn'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $useremail = mysqli_real_escape_string($db, $_POST['useremail']);
        $usertype = mysqli_real_escape_string($db, $_POST['usertype']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']); 
       
        if($password != $cpassword) {
            $cpassword_error = "Password and Confirm Password doesn't match";
            array_push($errors,"Password and Confirm Password doesn't match");
        }
        if(mysqli_num_rows(mysqli_query($db, "SELECT * FROM user_login WHERE user_email ='$useremail'"))>0)
        { $email_error = "Useremail already exists.Try with another.";
            array_push($errors,"useremail already exists");}

        if (!$errors) {
            if($usertype == "Customer")
            {$row=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM user_login WHERE user_type='$usertype' ORDER BY id DESC LIMIT 1"));
            $prev_id=$row['user_id'];
            $prev_no=end(explode('-',$prev_id))+1;
            $new_id="C-".$prev_no;}
            else if($usertype == "Car_Agency")
            {$row=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM user_login WHERE user_type='$usertype' ORDER BY id DESC LIMIT 1"));
            $prev_id=$row['user_id'];
            $prev_no=end(explode('-',$prev_id))+1;
            $new_id="A-".$prev_no;}

            if(mysqli_query($db, "INSERT INTO user_login(user_id,username, user_email, user_type ,password) VALUES('" . $new_id . "','" . $username . "', '" . $useremail . "', '" . $usertype . "', '" . $password . "')")) {
             header("location: sign-in.php");
             exit();
            } else {
               echo "Error: " . $sql . "" . mysqli_error($db);
            }
        }
        mysqli_close($db);
    }

