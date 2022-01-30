<?php
 
  require __DIR__ . '/../baseview/header.php';
  
  if(isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
  }   
  
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Document</title>
</head>
<body>

  <div class = "container" id ="section">
    <h1>Welcome <?php echo $username ?> </h1>

    <p>click on your username in the navagation or click underneath to update profile.</p>
    <li class="nav-item">
    <a class="nav-link" href="../profileview/index.php">Update profile</a>
    </li>
  </div>

  




  <?php
  require __DIR__ . '/../baseview/footer.html';
  ?>
    
</body>
</html>
