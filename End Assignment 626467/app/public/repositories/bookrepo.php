<?php
require __DIR__ . '/repository.php';



class BookRepo extends Repository{
   private $book;
   public function __construct()
   {
       
   }

   function createBook($title,$author,$description)
   {
    

    $repo = new Repository();
    $connection= $repo->dbConnect();
   
    $stmt = $connection->prepare("INSERT INTO book (title,author,description) VALUES (:title, :author,:description); ");
    
    $stmt->bindParam(":title",$title);
    $stmt->bindParam(":author",$author);
    $stmt->bindParam(":description",$description);
    var_dump("successful" + $title, $author);
    if(!$stmt->execute())
    {
         
        header("location:../../views/CreateBookview/index.php?error=stmtfailed");
        exit;
    }
    $stmt = null;
    header("location:../../views/CreateBookview/index.php?error=none");
   
   }
}