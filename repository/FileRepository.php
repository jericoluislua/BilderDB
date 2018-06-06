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

    public function uploadPost($title, $desc, $uname, $path, $isPriv){
        $query = ;
    }
}