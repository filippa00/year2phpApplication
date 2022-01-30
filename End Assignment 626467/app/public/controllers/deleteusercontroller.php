<?php
require_once('controller.php');
class DeleteUserCont extends Controller{
    private $deleteUserService;

    function __construct()
    {
        $this->deleteUserService = new UserService();

    }

    function deleteUser($id)
    {
     $this->deleteUserService->deleteUser($id);
    }


}
