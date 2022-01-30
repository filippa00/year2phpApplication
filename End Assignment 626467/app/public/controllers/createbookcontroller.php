<?php
require_once('controller.php');

require __DIR__ . '/../services/bookService.php';


//$dashboardController = new DashboardController();
       

class CreateBookController extends Controller{
    private $bookService;

    function __construct()
    {
        $this->bookService = new BookService();

    }

    function createBook($title,$author,$description)
    {
        
        // $title = $title['title'];
        // $author = $author['author'];
        // $description = $description['description'];
        return $this->bookService->createBook($title,$author,$description);
        //var_dump("in controller");
    }


}
