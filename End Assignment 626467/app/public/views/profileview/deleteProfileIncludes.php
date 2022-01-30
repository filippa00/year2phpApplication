<?php
//Grabbing the data
session_start();

if(isset($_POST["btnDeleteUser"]))
{
    if(isset($_SESSION['id']))    {
        $userId = $_SESSION['id'];
        $username = $_SESSION['username'];
      } 
}

//instantiate homecontroller class
require __DIR__ . '/../../repositories/userrepo.php';
require __DIR__ . '/../../classes/user.php';
require __DIR__ . '/../../services/userservice.php';
require __DIR__ . '/../../controllers/deleteusercontroller.php';

$deleteUser = new DeleteUserCont();
$deleteUser->deleteUser($userId);


//Running error handlers and user sign up
 require __DIR__ . '/../../classes/userinfo.php';
 


//Going to homepage

header("location:../homeview/index.php?error=none");