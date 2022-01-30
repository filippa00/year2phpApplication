<?php

class UserInfo extends User{
    private $username;
    private $booksLiked = array();
    private $tags = array();


    public function __construct($_username,$_booksLiked,$_tags){
        $this->username = $_username;
        $this->booksLiked=$_booksLiked;
        $this-> tags =$_tags;

    }
    
    public function getId() : int
    {
        return $this->id;
    }
    public function getTags() : array
    {
        return $this->tags;

    }

    public function getBooksLiked() : array
    {
        return $this->booksLiked;

    }


    public function setTags($_tags) 
    {
        $this->tags = $_tags;

    }

    public function setBooksLiked($_booksLiked) 
    {
        $this->booksLiked = $_booksLiked;

    }

}