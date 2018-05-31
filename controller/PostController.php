<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.05.2018
 * Time: 10:36
 */

class PostController
{
    public function index(){
        $view = new View('post');
        $view->title = 'Bilder-DB';
        $view->heading = 'Upload';
        $view->display();
    }

    public function fileUpload(){
    }
}