<?php
//Grabbing the data

if(isset($_POST["btnUpdatePassword"]))
{
    $oldPassword = htmlspecialchars($_POST["oldPassword"]);
    $newPassword = htmlspecialchars($_POST["newPassword"]);
}

//instantiate homecontroller class
require __DIR__ . '/../../repositories/userrepo.php';
require __DIR__ . '/../../classes/user.php';
require __DIR__ . '/../../services/userservice.php';
require __DIR__ . '/../../controllers/updateusercontroller.php';

$updateUser = new UpdateUserCont($oldPassword,$newPassword);


//Running error handlers and user sign up
 $updateUser->updatePassword();
 require __DIR__ . '/../../classes/userinfo.php';
 


//Going to homepage

header("location:../homeview/index.php?error=none");