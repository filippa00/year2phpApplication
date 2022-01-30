<?php
require_once('controller.php');


class HomeController extends Controller {

    public function __construct(){

    
     
    }
    
    public function index() {
    
        require __DIR__ . '/../views/homeview/index.php';
      
    }
}