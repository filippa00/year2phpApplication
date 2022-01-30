<?php

//Grabbing the data

if(isset($_POST["btnSignUp"]))
{
    $name = htmlspecialchars($_POST["name"]);
    $newUsername =htmlspecialchars($_POST["newUsername"]);
    $newPassword =htmlspecialchars($_POST["newPassword"]);
   
}
//instantiate homecontroller class
require __DIR__ . '/../../repositories/userrepo.php';
require __DIR__ . '/../../classes/user.php';
require __DIR__ . '/../../services/userservice.php';
require __DIR__ . '/../../controllers/usersignupcontr.php';

$signUp = new UserSignUpContr($name,$newUsername,$newPassword);

//Running error handlers and user sign up
$signUp->signUpUser();


//Going to dashboard

header("location:../dashboardview/index.php?error=none");
