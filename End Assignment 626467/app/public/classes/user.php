<?php
class User{
    private $id;
    private $name;
    private $username;
    private $password;
    

    public function __construct($_id, $_name, $_username, $_password){
        $this->id = $_id;
        $this->name= $_name;
        $this->username=$_username;
        $this->password=$_password;
        
    }
    
    
    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getUsername() : string
    {
        return $this->username;

    }


    public function getPassword() : string
    {
        return $this->password;
    }

    public function setId($_Id) 
    {
        $this->Id = $_Id;
    }

    public function setName($_name)
    {
        $this->name=$_name;
    }

    public function setusername($_username)
    {
        $this->username=$_username;
    }

    
    public function setPassword($_password)
    {
        $this->password =$_password;
    }

}

