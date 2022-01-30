<?php

require_once('controller.php');


class UserLoginContr extends Controller {
  
    private $username;
    private $password;
    private $userService;
    
       
    function __construct( $username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->userService = new UserService();
    }
    public function loginUser()
    {
        if($this->emptyInput()== false)
        {
          header("location:../../views/homeview/index.php?error=emptyInput");
          die;
        }
        

        $this->userService->getUser($this->username, $this->password);
        
    }

    private function emptyInput()
    {
        $result = true;
        if(empty($this->username)|| empty($this->password))
        {
            $result = false;
        }
        
        return $result;
    }

    public function getUserInfo($username)
    {
        $this->userService->getUserInfo($username);
    } 

    
}