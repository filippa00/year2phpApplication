<?php
require_once('controller.php');
//session_start();    
class UpdateUserCont extends Controller{
    
    private $oldInput1;
    private $newInput2;
    private $updateUserService;
    function __construct($_oldInput1,$_newInput2)
    {
    
        $this->oldInput1 = $_oldInput1;
        $this->newInput2 = $_newInput2;
        $this->updateUserService = new UserService();
        
    }

    public function updateUsername()
    {
        if($this->emptyInput()== false)
        {
          header("location:../../views/profileview/index.php?error=emptyInput");
          die;
        }

        if($this-> invalidUsername()== false)
        {
          header("location:../../views/profileview/index.php?error=username");
          die;
        }

        if($this->usernameTaken()== false)
        {
          header("location:../../views/profileview/index.php?error=userTaken");
          die;
        }
        
        $this->updateUserService->updateUsername($this->oldInput1,$this->newInput2);
    }

    private function emptyInput()
    {
        $result = true;
        if(empty($this->oldInput1) || empty($this-> newInput2))
        {
            $result = false;
        }
        
        return $result;
    }

    private function invalidUsername()
    {
        $result = true;
        
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this-> newInput2))
        {
            $result = false;
        }
        return $result;
    }

    private function usernameTaken()
    {
        $result = true;
        
        if(!$this->updateUserService->checkUser($this-> newInput2))
        {
            $result = false;
        }
        return $result;
    }

    function updatePassword()
    {
        if($this->emptyInput()==false)
        {
          header("location:../../views/profileview/index.php?error=emptyInput");
          die;
        }

        if($this->passwordMatch()==false)
        {
          header("location:../../views/profileview/index.php?error=emptyInput");
          die;
        }
        if(isset($_SESSION['id']))    {
            $id = $_SESSION['id'];
            $this->updateUserService->updatePassword($id,$this->newInput2);
        }

        
    }

    function passwordMatch()
    {
        $result = true;
        if(isset($_SESSION['id']))    {
            $checkPassword = password_verify($this->oldInput1,$_SESSION["password"]);
        
            if($checkPassword == false)
            {
                $result = false;
            } 
        }
        return $result;
    }
}
