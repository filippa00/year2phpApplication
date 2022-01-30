<?php
class recommendation implements JsonSerializable{
    private $user;
    private $books = array();
    private $tags = array();

    function __construct($_user,$_books, $_tags)
    {
        $this->user = $_user;
        $this->books= $_books;
        $this->tags=$_tags;
    }
    
    public function getuser() : User
    {
        return $this->user;
    }

    public function getBooks() : array
    {
        return $this->books;
    }

    public function getTags() : array
    {
        return $this->tags;

    }

    public function setUser($_user) 
    {
        $this->user = $_user;
    }

    public function setBooks($_books) 
    {
         $this->books = $_books;
    }

    public function setTags($_tags)
    {
         $this->tags = $_tags;

    }

    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }


}

