<?php
    require __DIR__ . '/../baseview/header.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dashboardview/dashboard.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body id = "section">
    <div container>
        <form action="updateUsernameInc.php" method="post">
            <div class="form-floating">
                <input type="textbox" class="form-control" id="floatingInput" placeholder="new username" name ="newUsername">
                <label for="floatingInput">new username</label>
            </div>
            <button type="submit" class="mt-2 btn btn-secondary btn-lg" name= "btnUpdateUsername">Update Info </button>
        </form>
    </div>
    

    <form action="updatePasswordsInc.php" method="post">
    <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="old Password" name ="oldPassword">
            
            <label for="floatingPassword"> old Password</label>

        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="new Password" name ="newPassword">
            <label for="floatingPassword"> new Password</label>

        </div>
        <button type="submit" class="mt-2 btn btn-secondary btn-lg" name= "btnUpdatePassword">Update Info </button>
    </form>
    <form action="deleteProfileIncludes.php" method="post">
        <button type="submit" class="mt-2 btn btn-danger btn-lg" name= "btnDeleteUser">Delete account </button>
    </form>
    

    <?php
    require __DIR__ . '/../baseview/footer.html';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>