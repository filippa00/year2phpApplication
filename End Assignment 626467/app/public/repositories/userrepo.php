<?php
require __DIR__ . '/repository.php';

class UserRepo extends Repository{
   private $user;
   public function __construct()
   {
       
   }
   
    
    protected function checkUser($username)
    {
        $repo = new Repository();
       $connection= $repo->dbConnect();
       
        $stmt =$connection->prepare("SELECT id FROM user WHERE username = :username; ");
        $stmt->bindParam(":username",$username);

        if(!$stmt->execute())
        {
            $stmt = null;
            header("location:../../views/homeview/index.php?error=stmtfailed");
            die;
        }
        $resultCheck = true;
        if($stmt->rowCount() > 0)
        {
            $resultCheck = false;
        }

        return $resultCheck;
    }

    protected function registerUser($name,$username,$password)
    {
        $repo = new Repository();
        $connection= $repo->dbConnect();
       
        $stmt = $connection->prepare("INSERT INTO user (name,username,password) VALUES (:name, :username,:password); ");
        $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":password",$hashedPwd);

        if(!$stmt->execute())
        {
             
            header("location:../../views/homeview/index.php?error=stmtfailed");
            exit;
        }
        $stmt = null;
        $this->getUser($username,$password);
    }

    protected function getUser($username,$password)
    {
        $repo = new Repository();
       $connection= $repo->dbConnect();
        $stmt =$connection->prepare("SELECT password FROM user WHERE username = :username; ");
        $stmt->bindParam(":username",$username);
        //get hashed password
        if(!$stmt->execute())
        {
            $stmt = null;
            header("location:../../views/homeview/index.php?error=stmtfailed");
            die;
        }
       //check to see if rows are returned
        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location:../../views/homeview/index.php?error=usernotfound");
            die;
        }
        //check hashed password against password
        $hashedPwd = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password,$hashedPwd[0]["password"]);
        
        if($checkPassword == false)
        {
            $stmt = null;
            header("location:../../views/homeview/index.php?error=wrongpassword");
            die;
        }
        else if($checkPassword == true)
        {
            //check both the username and password
            $repo = new Repository();
            $connection= $repo->dbConnect();
             $stmt =$connection->prepare("SELECT * FROM user WHERE username = :username; AND password = :password;");
             $stmt->bindParam(":username",$username);
             $stmt->bindParam(":password",$password);
            

            if(!$stmt->execute())
            {
            $stmt = null;
            header("location:../../views/homeview/index.php?error=stmtfailed");
            die;
            }

            if($stmt->rowCount() == 0)
            {
                $stmt = null;
            header("location:../../views/homeview/index.php?error=usernotfound");
            die;
            }
            
            $userArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($userArray as $row)
            {
                $thisid = $row['id'] ;
                $thisname = $row['name'];
                $thisusername = $row['username'];
                $thispassword = $row['password'];
            } 
            $this -> user = new User ($thisid,$thisname,$thisusername,$thispassword);    
            session_start();
            // $_SESSION["id"] = $user[0]["id"];
            // $_SESSION["username"] = $user[0]["username"];
            $this ->user-> setId($thisid);
            $this->user->setName($thisname);
            $this->user->setusername($thisusername);
            $this->user->setPassword($thispassword);

            $_SESSION['id'] = $this-> user ->getId();
            $_SESSION['name'] = $this ->user->getName();
            $_SESSION['username'] = $this ->user->getUsername();
            $_SESSION['password'] = $this ->user->getPassword();
           
           
            return $this->user;    
        }
    }

    public function getUserInfo($username)
    {
        $userInfo = null;
        $repo = new Repository();
        $connection= $repo->dbConnect();
         $stmt =$connection->prepare("SELECT booksLiked,tags FROM user WHERE username = :username; ");
         $stmt->bindParam(":username",$username);

         if(!$stmt->execute())
         {
             $stmt = null;
             header("location:../../views/homeview/index.php?error=stmtfailed");
             die;
         }
        //check to see if rows are returned
        if($stmt->rowCount() == 0)
        {
            $_SESSION['booksLiked'] = null;
            $_SESSION['tags']= null;

            return $userInfo;
        }
      
           
        $userInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$stmt->execute())
        {
             $stmt = null;
            header("location:../../views/homeview/index.php?error=stmtfailed");
            die;
        }
           //check to see if rows are returned
          
        foreach($userInfo as $row)
        {
            $booksLiked = $row['booksLiked'] ;
            if($booksLiked == null)
            {
               // echo "no booksd liked";
                header("location:../../views/dashboardview/index.php?error=nobooksLiked");
                die;
                    
            }
            $tags = $row['tags'];
            if($tags == null)
            {
                //echo "no books liked";
                header("location:../../views/dashboardview/index.php?error=notagsLiked");
                die;
                    
            }
        } 
        
        //split database strings into an array
        $thisBooksLiked = explode(',',$booksLiked);
        $thisTags = explode(',',$tags);

        $userInfo = new UserInfo($username,$thisBooksLiked,$thisTags);
             
        $userInfo-> setBooksLiked($thisBooksLiked);
        $userInfo-> setTags($thisTags); 

        $_SESSION['booksLiked'] = $userInfo ->getBooksLiked();
        $_SESSION['userTags'] = $userInfo->getTags();
   
        return $userInfo;
    } 

    function updateUsername($userId,$username)
    {
        $repo = new Repository();
        $connection= $repo->dbConnect();
       
        $stmt = $connection->prepare(" UPDATE user SET username = :username WHERE id =:id; ");
        
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":id",$userId);
        

        if(!$stmt->execute())
        {
             
            header("location:../../views/homeview/index.php?error=stmtfailed");
            exit;
        }
        $stmt = null;

    }

    function updatePassword($id,$newPassword)
    {
        $repo = new Repository();
        $connection= $repo->dbConnect();
       
        $stmt = $connection->prepare("UPDATE user SET password = :password WHERE id = :id; ");
        $hashedPwd = password_hash($newPassword,PASSWORD_DEFAULT);
        $stmt->bindParam(":password",$hashedPwd );
        $stmt->bindParam(":id",$id);
        

        if(!$stmt->execute())
        {
             
            header("location:../../views/homeview/index.php?error=stmtfailed");
            exit;
        }
        $stmt = null;
    }

    function deleteUser($userId)
    {
        $repo = new Repository();
        $connection= $repo->dbConnect();
       
        $stmt = $connection->prepare("DELETE FROM user WHERE id = :id; ");
        
        
        $stmt->bindParam(":id",$userId);
        

        if(!$stmt->execute())
        {
             
            header("location:../../views/homeview/index.php?error=stmtfailed");
            exit;
        }
        $stmt = null;
        
    }


}