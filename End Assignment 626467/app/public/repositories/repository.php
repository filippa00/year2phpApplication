<?php
 
class Repository{
    
   protected function __construct()
   {

   }
 

   protected function dbConnect()
   {
        require __DIR__ . '/../../dbconfig.php';
       try{
        $connection = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
       }catch(PDOException $e)
       {
            echo "Connection failed " .$e->getMessage();
       }
    
   }

}