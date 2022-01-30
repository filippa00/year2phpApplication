<?php
class Book implements JsonSerializable{
    private $id;
    private $title;
    private $author;
    private $tags = array();
    
    public function __construct($_id, $_title, $_author, $_tags){
        $this->id = $_id;
        $this->title= $_title;
        $this->author=$_author;
        $this->tags=$_tags;
    }
    public function getId() : int
    {
        return $this->id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function getAuthor() : string
    {
        return $this->author;

    }

    public function getTags() : array
    {
        return $this->tags;

    }

    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function setTitle($_title)
    {
       $this->title = $_title;
    }

    public function setAuthor($_author) 
    {
       $this->author =$_author ;

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
