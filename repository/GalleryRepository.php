<?php

require_once '../lib/Repository.php';
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 07.06.2018
 * Time: 08:16
 */

class GalleryRepository extends Repository
{
    protected $tableName = 'gallery';
    protected $id = 'id';

    public function createGallery($title, $desc, $isPub){
        $query = "INSERT INTO $this->tableName(title, description, isPublic) VALUES(?,?,?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssi', $title, $desc, $isPub);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;
    }
}