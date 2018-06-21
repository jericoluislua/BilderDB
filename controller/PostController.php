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
    public function index(){
        $view = new View('post_index');
        $view->title = 'Bilder-DB';
        $view->heading = 'Posts';
        $view->display();

    }
    public function upload(){
        $GalleryRepository = new GalleryRepository();
        $LoginRepository = new LoginRepository();
        $FileRepository = new FileRepository();
        $view = new View('post_upload');
        $view->title = 'Bilder-DB';
        $view->heading = 'Upload';
        if(isset($_SESSION['loginEmail'])) {
            $view->user = $LoginRepository->getbyEmail($_SESSION['loginEmail']);
            if(isset($_POST['fileupload'])){
                $file = $_POST['fileToUpload'];
                $title = $_POST['filetitle'];
                $description = $_POST['filedesc'];
            $FileRepository->uploadPost($file, $title,$description);
            }
        }
        $view->galleries = $GalleryRepository->readAll();
        $view->display();



    }
}