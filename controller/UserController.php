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

        $view = new View('user');
        $view->title = 'Bilder-DB';
        $view->heading = 'My Profile';
        //$view->users = $repository->readAll();
        $view->display();
    }

}