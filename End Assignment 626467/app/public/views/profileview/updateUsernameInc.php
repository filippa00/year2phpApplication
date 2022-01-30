<?php
//Grabbing the data
session_start();
if(isset($_POST["btnUpdateUsername"]))
{
    if(isset($_SESSION['id']))    {
        $userId = $_SESSION['id'];
        $newUsername = htmlspecialchars($_POST["newUsername"]);
      }
}

//instantiate homecontroller class
require __DIR__ . '/../../repositories/userrepo.php';
require __DIR__ . '/../../classes/user.php';
require __DIR__ . '/../../services/userservice.php';
require __DIR__ . '/../../controllers/updateusercontroller.php';


$updateUser = new UpdateUserCont($userId,$newUsername);


//Running error handlers and user sign up
 $updateUser->updateUsername();
 require __DIR__ . '/../../classes/userinfo.php';



//Going to homepage

header("location:../homeview/index.php?error=none");