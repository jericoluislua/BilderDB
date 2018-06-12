<?php
require_once '../repository/LoginRepository.php';
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 17.05.2018
 * Time: 08:38
 */

class UserController
{
    public function index()
    {

        $LoginRepository = new LoginRepository();
        $view = new View('user');
        $view->title = 'Bilder-DB';
        $view->heading = 'My Profile';
        $view->display();
        if(isset($_POST['changeinput'])){
            $username = $_POST['changeuname'];
            $email = $_POST['changeemail'];
            if(isset($_POST['changeuname'])){
                $LoginRepository->changeUsername($username);
            }
            else if(isset($_POST['email'])){
                $LoginRepository->changeEmail($email);
            }
        }
    }

}