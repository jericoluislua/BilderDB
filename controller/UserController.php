<?php
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

        //$userRepository = ;
        $view = new View('user');
        $view->title = 'Bilder-DB';
        $view->heading = 'My Profile';
        //$view->users = $userRepository->readAll();
        $view->display();
    }

}