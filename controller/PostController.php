<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.05.2018
 * Time: 10:36
 */
require_once '../repository/GalleryRepository.php';
require_once '../repository/LoginRepository.php';
require_once '../repository/FileRepository.php';

class PostController
{

    public function upload(){
        $GalleryRepository = new GalleryRepository();
        $LoginRepository = new LoginRepository();
        $FileRepository = new FileRepository();
        $view = new View('post_upload');
        $view->title = 'Bilder-DB';
        $view->heading = 'Upload';
        $view->user = $LoginRepository->getbyEmail($_SESSION['loginEmail']);
        $view->galleries = $GalleryRepository->readAll();
        $view->display();
        if(isset($_SESSION['loginEmail'])) {

            if(isset($_POST['fileupload'])){
                $title = $_POST['filetitle'];
                $description = $_POST['filedesc'];
                if(preg_match("/[\"\*\/\:\<\>\?\'\|]+/", $title)){
                    preg_replace("/[\"\*\/\:\<\>\?\'\|]+/", '_', $title);
                    if($FileRepository->existingTitle($title) == false){
                        $FileRepository->uploadPost($title, $description);
                    }
                    else{ echo 'File Title already exists.'; }
                }
                else{
                    if($FileRepository->existingTitle($title) == false){
                        $FileRepository->uploadPost($title, $description);
                    }
                    else{ echo 'File Title already exists.'; }
                }
            }
        }
    }
    public function delete()
    {

        $FileRepository = new GalleryRepository();
        $FileRepository->deleteById($_GET['id']);
        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /gallery/privateGallery');
    }
}