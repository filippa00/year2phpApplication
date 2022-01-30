<?php
    require __DIR__ . '/../baseview/header.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">

</head>
<body>

    

    <div class="col-6 justify-content-centre">

        <form  method="post">
            <h1>Create a book</h1>
            
            <div class = "container">
            <label div class="pt-1" for="name" id = "bookTitle" >Title</label><br>
            <input type="textbox" placeholder="title" name="title" div class="p-1 rounded border border-5"><br>

            <label div class="pt-1" for="author" id = "bookAuth">Author</label><br>
            <input type="textbox" placeholder="author" name="author"  div class=" p-1 rounded border border-5"><br>

            <label div class="pt-1" for="desciption" id = "bookDescription">Description</label><br>
            <input type="description" placeholder="description" name="description"  div class="p-1 rounded border border-5"><br>
            
            <button type="submit" class="mt-2 btn btn-secondary btn-lg" name= "btnCreateBook" value = "Send" id = "createBook" >Create Book </button>
            </div>
            
            
        </form>
    </div>





    <?php
    require __DIR__ . '/../baseview/footer.html';
    ?>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    
</body>
</html>