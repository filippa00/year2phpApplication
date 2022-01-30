<?php

//require __DIR__ . '/../repositories/userrepo.php';
//require __DIR__ . '/../classes/user.php';
//require_once("../repositories/userrepo.php");
//require("../classes/user.php");

class UserService extends UserRepo{
    
    private $userrepo;
  

    function __construct()
    {
        $this->userrepo = new UserRepo();
        
    }

    public function checkUser($username)
    {
         $userCheck = $this->userrepo->checkUser($username);
         return $userCheck;
    }

    public function registerUser($name,$username,$password)
    {
        $this->userrepo->registerUser($name,$username,$password);
    }

    public function getUser($username,$password)
    {
       $user =$this->userrepo->getUser($username,$password);
        return $user;
    }

    public function getUserInfo($username)
    {
        return $this->userrepo->getUserInfo($username);
    } 
    
    public function deleteUser($userId)
    {
        $this->userrepo->deleteUser($userId);
    }

    public function updateUsername($userId,$newUsername)
    {
        $this->userrepo->updateUsername($userId,$newUsername);
    }
    public function updatePassword($id,$newPassword)
    {
        $this->userrepo->updatePassword($id,$newPassword);
    }
    
}