<?php
class Questionaire implements JsonSerializable{
    private $id;
    private $user;
    
    function __construct($_id,$_user)
    {
        $this->id= $_id; 
        $this->user = $_user;   
    }
    public function getId() : int
    {
        return $this->id;
    }

    public function getUser() : User
    {
        return $this->user;
    }

    public function setId($_id) 
    {
        $this->id = $_id;
    }

    public function setUser($_user) 
    {
        $this->user = $_user;
    }
 
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}

?>