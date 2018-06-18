<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.06.2018
 * Time: 09:13
 */
require_once '../repository/LoginRepository.php';

class AllusersController
{
    public function index(){
        $LoginRepository = new LoginRepository();

        $view = new View('allusers');
        $view->title = 'Bilder-DB';
        $view->heading = 'All Users';
        $view->users = $LoginRepository->readAll();
        $view->display();
    }
}