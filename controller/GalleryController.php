<?php
require_once '../repository/GalleryRepository.php';
require_once '../repository/FileRepository.php';
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 07.06.2018
 * Time: 08:25
 */

class GalleryController
{
    /**
     * Default-Seite für das Gallery: Zeigt das Gallery-Formular an
     * Dispatcher: /gallery
     */
    public function index()
    {
        $view = new View('gallery');
        $view->title = 'Bilder-DB';
        $view->heading = 'Gallery/ies';
        $view->display();
    }
}