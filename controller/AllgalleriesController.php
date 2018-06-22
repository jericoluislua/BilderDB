<?php
require_once '../repository/GalleryRepository.php';
require_once '../repository/FileRepository.php';
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 21.06.2018
 * Time: 08:59
 */

class AllgalleriesController
{
    public function index(){
        $GalleryRepository = new GalleryRepository();
        $FileRepository = new FileRepository();
        $view = new View('allgalleries');
        $view->title = 'Bilder-DB';
        $view->heading = 'All Galleries';
        $view->files = $FileRepository->readAll();
        $view->galleries = $GalleryRepository->readAll();

        $view->display();
    }
}