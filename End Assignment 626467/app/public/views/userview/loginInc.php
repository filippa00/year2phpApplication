<?php


//Grabbing the data

if(isset($_POST["btnSignIn"]))
{
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
}

//instantiate homecontroller class
require __DIR__ . '/../../repositories/userrepo.php';
require __DIR__ . '/../../classes/user.php';
require __DIR__ . '/../../services/userservice.php';
require __DIR__ . '/../../controllers/userlogincontr.php';

$login = new UserLoginContr($username,$password);


//Running error handlers and user sign up
 $login->loginUser();
 require __DIR__ . '/../../classes/userinfo.php';
 $userinfo = $login->getUserInfo($username);


//Going to dashboard

header("location:../dashboardview/index.php?error=none");
