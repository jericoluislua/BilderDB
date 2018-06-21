<?php

require_once '../lib/Repository.php';
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 06.06.2018
 * Time: 20:11
 */

class FileRepository extends Repository
{
    protected $tableName = 'post';
    protected $id = 'id';


    public function uploadPost($file, $title, $desc){
        $query = "INSERT INTO $this->tableName(title, description, path, galleryid) VALUES(?,?,?,?)";
        $gallery = $_POST['galleryselect'];
        $target_dir = "images/" . $gallery;
        $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
        $this->uploader($target_file);
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssi', $title, $desc, $target_file, $gallery);
    }
    //https://www.w3schools.com/Php/php_file_upload.asp
    public function uploader($target_file){
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST['filesubmit'])) {
            $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES['fileToUpload']['size'] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "There was an error on uploading. Try again.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}