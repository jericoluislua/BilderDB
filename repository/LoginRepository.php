<?php
require_once '../lib/Repository.php';
/**
 * Datenbankschnittstelle für die Benutzer
 */
  class LoginRepository extends Repository
  {
      protected $tableName = 'user';
      protected $id = 'id';

      public function create($email, $password, $redoPassword)
      {

          $password = password_hash($password, PASSWORD_DEFAULT);
          $query = "INSERT INTO $this->tableName(email, password) VALUES (?, ?)";
          $statement = ConnectionHandler::getConnection()->prepare($query);

          if($redoPassword === $password){
              $statement->bind_param('ss', $email, $password);
              if (!$statement->execute()) {
                  throw new Exception($statement->error);
              }
              return $statement->insert_id;
          }
          else if($redoPassword !== $password){
              echo "Wrong password.";
              return false;
          }

      }

      public function login($email, $password)
      {
          $query = "SELECT password FROM $this->tableName WHERE email = ?";
          $statement = ConnectionHandler::getConnection()->prepare($query);
          $statement->bind_param('ss', $email, $password);
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

  }
?>