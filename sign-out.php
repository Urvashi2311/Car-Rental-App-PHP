<?php
    session_start();
    unset($_SESSION["IS_LOGIN"]);  
    unset($_SESSION['ID']);
    unset($_SESSION['USER_NAME']);
    unset($_SESSION['EMAIL']);
    unset($_SESSION['USER_TYPE']);
    unset($_SESSION['SUCCESS']);
    header("Location:sign-in.php");
    die();
    
?>