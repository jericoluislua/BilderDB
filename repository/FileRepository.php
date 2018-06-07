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

    public function uploadPost($title, $desc, $uname, $path){
        $query = "INSERT INTO $this->tableName(title, description, username, path) VALUES(?,?,?,?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss', $title, $desc, $uname, $path);
    }
}