<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <link rel="stylesheet" href="homestyle.css">
    <title>Discover Reads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
   
</head>

<body>
    <?php
    
    //Put this POST block right at the top of the page.
    if (isset($_POST['btnDeleteUser'])) {
    $alert =  "<script>alert(\'You have to tick the box\')</script>";
    echo $alert;
    }
    ?>
    <section id = "home">
        <nav  class="navbar navbar-light">
            <div class="container-fluid">
                <div class="svg-bg"> </div>
                <form action= "../../views/userview/loginInc.php" method="post"class="d-flex">
                    <input type="textbox" placeholder="username" name="username" div class="m-3 p3 rounded-pill border border-5">
                    <input type="password" placeholder="password" name="password" div class="m-3 p3 rounded-pill border border-5">
                    <button type="submit" class="btn btn-outline-link" name= "btnSignIn">sign in </button>
                </form>
            </div>
        </nav>
        <div class="container-lg">
            <div class="row justify-content-end">
                <div class="col-6 justify-content-start">
                    <h1 class="display-1 ">Discover</h1>
                    <h1 class="display-2">Reads</h1>
                    <div class="imageBook"></div>
                </div>

                <div class="col-6 justify-content-end">

                    <form action="../../views/userview/SignUpInc.php" method="post">
                        <label div class="mt-3 pt-3 mb-3 pt-3">Sign up for free</label><br>
                        <input type="hidden" name="type" value="register">
                        <label div class="pt-1" for="name">name</label><br>
                        <input type="textbox" placeholder="name" name="name" div class="p-1 rounded border border-5"><br>

                        <label div class="pt-1" for="newUsername">username</label><br>
                        <input type="textbox" placeholder="username" name="newUsername"  div class=" p-1 rounded border border-5"><br>

                        <label div class="pt-1" for="newPassword">password</label><br>
                        <input type="password" placeholder="password" name="newPassword"  div class="p-1 rounded border border-5"><br>
                        <button type="submit" class="mt-2 btn btn-secondary btn-lg" name= "btnSignUp" value = "Send">SIGN UP </button>
                    </form>
                </div>
                <?php
                    if(isset($_GET["error"]))
                    {
                        if($_GET["error"] == "emptyInput")
                        {
                            echo"<p>Fill in all fields!<p>";
                        }
                        else if($_GET["error"] == "username")
                        {
                            echo"<p>Choose a proper username!<p>";
                        }
                    }
                ?>

            </div>
        </div>
    </section>

    

    <section id = about>
    <div class="p-10 col-4 justify-content-center">
            <div container >

            </div>
        </div>
        <div class="p-10 col-4 ">
            <div container >
                <h1>How it works</h1>
                <p>On this website you can manager your profile. Create an account, update your account and delete it</p>
             

            </div>
        </div>
        <div class="p-10 col-4">
            <div container >
            

            </div>
        </div>
    </section>
  
    <Footer>
    <div class = "container">  
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">How it works</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Sign in</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Sign up</a>
                </li>
            </ul>
            <p class="text-center text muted"> &copy; 2021 Discover Reads</p>
        </footer>
    </div>
    </Footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>