<?php
require_once '../repository/GalleryRepository.php';
require_once '../repository/FileRepository.php';
require_once '../repository/LoginRepository.php';
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 07.06.2018
 * Time: 08:25
 */

class GalleryController
{
    public function privateGallery(){
        $GalleryRepository = new GalleryRepository();
        $LoginRepository = new LoginRepository();
        $FileRepository = new FileRepository();
        $view = new View('gallery_private');
        $view->title = 'Bilder-DB';
        $view->heading = 'My Galleries';
        $view->files = $FileRepository->readAll();
        $view->galleries = $GalleryRepository->readAll();
        //if(isset($_SESSION['loginEmail'])) {
        //    $view->user = $LoginRepository->getbyEmail($_SESSION['loginEmail']);
        //}
        $view->display();
    }
    public function publicGallery(){
        $GalleryRepository = new GalleryRepository();
        $FileRepository = new FileRepository();
        $view = new View('gallery_public');
        $view->title = 'Bilder-DB';
        $view->heading = 'Public Galleries';
        $view->files = $FileRepository->readAll();
        $view->galleries = $GalleryRepository->readAll();
        $view->display();
    }
    public function create()
    {
        $LoginRepository = new LoginRepository();
        $GalleryRepository = new GalleryRepository();
        $view = new View('gallery_create');
        $view->title = 'Bilder-DB';
        $view->heading = 'Create a Gallery';
        $view->display();
        if(isset($_POST['gallerycreate'])){
            $title = htmlspecialchars($_POST['gallerytitle']);
            $desc = htmlspecialchars($_POST['gallerydesc']);
            $user = $LoginRepository->getbyEmail($_SESSION['loginEmail']);

            if ($GalleryRepository->existingTitle($title)){
                echo  "\"" . $title . "\" already exists.";
            }
            else{
                if(isset($_POST['galleryispublic'])){
                    $pubBool = true;
                    echo "Public gallery \"" . $title . "\" created by " . $_SESSION['loginEmail'];
                }
                else{
                    $pubBool = false;
                    echo "Private gallery \"" . $title . "\" created by " . $_SESSION['loginEmail'];
                }

                $GalleryRepository->createGallery($title,$desc,$pubBool, $user->id);
            }
        }
    }
    public function delete()
    {

        $GalleryRepository = new GalleryRepository();
        $GalleryRepository->deleteById($_GET['id']);
        header('Location: /gallery/privateGallery');
    }
}