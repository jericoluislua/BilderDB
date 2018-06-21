<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 21.06.2018
 * Time: 08:59
 */
require_once '../repository/GalleryRepository.php';
require_once '../repository/FileRepository.php';

class AllgalleriesController
{
    public function index(){
        $GalleryRepository = new GalleryRepository();
        $view = new View('allgalleries');
        $view->title = 'Bilder-DB';
        $view->heading = 'All Galleries';
        $view->galleries = $GalleryRepository->readAll();

        $view->display();
    }
    public function delete()
    {
        $GalleryRepository = new GalleryRepository();
        $GalleryRepository->deleteById($_GET['id']);
        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /allgalleries');
    }
}