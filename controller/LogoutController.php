<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 03.05.2018
 * Time: 21:38
 */

class LogoutController
{
    public function index(){
        if(isset($_SESSION['LoggedIn'])){
            session_destroy();
            session_unset($_SESSION['LoggedIn']);
            header('Location: /');
        }
    }
}