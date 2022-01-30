<?php
class SwitchRouter {
    public function route($uri, $method, $body, $path) {    
        // using a simple switch statement to route URL's to controller methods
        switch($uri) {

            case '': 
                require_once('controllers/homecontroller.php');
                $controller = new HomeController();
                $controller->index();
                break;

            case 'dashboard': 
               // require __DIR__ . '/controllers/dashboardcontroller.php';
                require_once('controllers/dashboardcontroller.php');
                $controller = new DashboardController();
                $controller->index();
                break;

            case 'register': 
                require_once('controllers/dashboardcontroller.php');
                $controller = new DashboardController();
                $controller->index();
                break;
            
            case 'login': 
                require_once('controllers/dashboardcontroller.php');
                $controller = new DashboardController();
                $controller->index();
                break;
            case 'login': 
                require_once('controllers/dashboardcontroller.php');
                $controller = new DashboardController();
                $controller->index();
                break;
            
            case 'createbook': 
                require_once('controllers/createbookcontroller.php');
                $controller = new CreateBookController();
                if(isset($_POST["btnCreateBook"]))
                {
                    $title = htmlspecialchars($_POST["title"]);
                    $author = htmlspecialchars($_POST["author"]);
                    $description = htmlspecialchars($_POST["description"]);
                    $controller->createBook($title,$author,$description);
                }
                
                break;

            default:
                http_response_code(404);
                break;
        }
    }
}
?>