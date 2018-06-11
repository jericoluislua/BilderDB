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
        $view = new View('gallery_index');
        $view->title = 'Bilder-DB';
        $view->heading = 'Gallery/ies';
        $view->display();
    }
    public function create()
    {
        $view = new View('gallery_create');
        $view->title = 'Bilder-DB';
        $view->heading = 'Create a Gallery';
        $view->display();
        if(isset($_POST['gallerycreate'])){
            $title = htmlspecialchars($_POST['gallerytitle']);
            $desc = htmlspecialchars($_POST['gallerydesc']);
            if(isset($_POST['galleryispublic'])){
                $pubBool = true;
                echo "Public gallery \"" . $title . "\" created by " . $_POST['loginemail'];
            }
            else{
                $pubBool = false;
                echo "Private gallery \"" . $title . "\" created by" . $_POST['loginemail'];
            }
            $GalleryRepository = new GalleryRepository();
            $GalleryRepository->createGallery($title,$desc,$pubBool);
        }
    }
}