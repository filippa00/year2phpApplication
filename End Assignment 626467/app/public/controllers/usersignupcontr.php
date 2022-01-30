<?php
require_once('controller.php');
//require_once("../services/userservice.php");


class UserSignUpContr extends Controller {
    private $name;
    private $newUsername;
    private $newPassword;
    private $userService;
       
    function __construct($name, $newUsername, $newPassword)
    {
        $this->name = $name;
        $this->newUsername = $newUsername;
        $this->newPassword = $newPassword;
        $this->userService = new UserService();
    }
    public function signUpUser()
    {
        if($this->emptyInput()== false)
        {
          header("location:../../views/homeview/index.php?error=emptyInput");
          die;
        }

        if($this-> invalidUsername()== false)
        {
          header("location:../../views/homeview/index.php?error=username");
          die;
        }
        if($this->usernameTaken()== false)
        {
          header("location:../../views/homeview/index.php?error=userTaken");
          die;
        }
        

        $this->userService->registerUser($this->name, $this->newUsername, $this->newPassword);
        
    }

    private function emptyInput()
    {
        $result = true;
        if(empty($this->name) || empty($this->newUsername)|| empty($this->newPassword))
        {
            $result = false;
        }
        
        return $result;
    }

    private function invalidUsername()
    {
        $result = true;
        
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->newUsername))
        {
            $result = false;
        }
        return $result;
    }

    private function usernameTaken()
    {
        $result = true;
        
        if(!$this->userService->checkUser($this->newUsername))
        {
            $result = false;
        }
        return $result;
    }

    
 
}
