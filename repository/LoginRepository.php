<?php
require_once '../lib/Repository.php';
/**
 * Datenbankschnittstelle für die Benutzer
 */
class LoginRepository extends Repository
{
    protected $tableName = 'user';
    protected $id = 'id';

    public function create($uname, $email, $password)
    {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO $this->tableName(username, email, password) VALUES (?, ?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss', $uname, $email, $password);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;
        //else if($redoPassword !== $password){
        //    echo "Wrong password.";
        //    return false;
        //}

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


    public function existingEmail($email)
    {
        $query = "SELECT * FROM user WHERE (email = '$email')";
        $res = mysqli_query(ConnectionHandler::getConnection(), $query);

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($email == $row['email']) {
                return true;
            }
        }
        return false;
    }

    public function existingUsername($uname){
        $query = "SELECT * FROM user WHERE (username = '$uname')";
        $res = mysqli_query(ConnectionHandler::getConnection(),$query);

        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($uname == $row['username']) {
                return true;
            }
        }
        return false;
    }
}
?>