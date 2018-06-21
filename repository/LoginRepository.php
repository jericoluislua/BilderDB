<?php
require_once '../lib/Repository.php';
/**
 * Datenbankschnittstelle für die Benutzer
 */
class LoginRepository extends Repository
{
    protected $tableName = 'user';
    protected $id = 'id';

    public function create($uname, $email, $password, $isAdmin)
    {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO $this->tableName(username, email, password, isAdmin) VALUES (?, ?, ?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->bind_param('sssi', $uname, $email, $password, $isAdmin);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;

    }

    public function login($email, $password)
    {
        $query = "SELECT password FROM $this->tableName WHERE email = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $email);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        $result = $statement->get_result();
        if($result->num_rows == 0){
            return false;
        }
        $user = $result->fetch_object();
        if(password_verify($password,$user->password)){
            return true;
        }
        return false;
    }

    public function getbyEmail($email){
        $query = "SELECT $this->id, username FROM $this->tableName WHERE email = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $email);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        $result = $statement->get_result();
        $row = $result->fetch_object();

        $result->close();

        return $row;

    }
    public function existingEmail($email)
    {
        $query = "SELECT $this->id FROM $this->tableName WHERE email = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $email);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        $result = $statement->get_result();
        if($result->num_rows >= 1){
            return true;
        }
        return false;
    }

    public function existingUsername($uname){
        $query = "SELECT $this->id FROM $this->tableName WHERE username = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->bind_param('s', $uname);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        $result = $statement->get_result();
        if($result->num_rows >= 1){
            return true;
        }
        return false;
    }

    public function changeEmail($email, $uid){
        $query = "UPDATE $this->tableName SET email = ? WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->bind_param('si', $email, $uid);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function changeUsername($uname, $uid){
        $query = "UPDATE $this->tableName SET username = ? WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->bind_param('si', $uname, $uid);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function changePassword($password, $uid){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE $this->tableName SET password = ? WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->bind_param('si', $password, $uid);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

}
?>