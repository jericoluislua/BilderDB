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
//how to get id of the logged in acct im stucc
    public function createGallery($title, $desc, $isPub, $uid){
        $query = "INSERT INTO $this->tableName(title, description, isPublic, userid) VALUES(?,?,?,?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssii', $title, $desc, $isPub,$uid);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;
    }
    public function readAll()
    {
        $query = "SELECT g.id, g.title,g.description,g.userid, g.isPublic, u.username  FROM {$this->tableName} AS g JOIN user AS u on g.userid = u.id";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        return $rows;
    }
}