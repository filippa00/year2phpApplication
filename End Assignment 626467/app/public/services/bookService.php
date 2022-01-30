<?php
require __DIR__ . '/../repositories/bookrepo.php';

class BookService extends BookRepo{
    
    private $bookRepo;
  

    function __construct()
    {
        $this->bookRepo = new BookRepo();
        
    }

    function createBook($title,$author,$description)
    {
        return $this->bookRepo->createBook($title,$author,$description);
       

    }
}