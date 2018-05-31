<?php
require_once '../repository/LoginRepository.php';
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 02.05.2018
 * Time: 21:15
 */

class RegistrationController
{
    public function index(){
        $view = new View('registration');
        $view->title = 'Bilder-DB';
        $view->heading = 'Registration';
        $view->display();

        if (isset($_POST['regsubmit'])) {
            $uname = $_POST['reguname'];
            $email = $_POST['regemail'];
            $password  = $_POST['regpassword'];
            $redopass = $_POST['redopassword'];
            if ($password == $redopass){
                $statement = "SELECT * FROM user WHERE (username = '$uname' OR email = '$email')";
                $res = mysqli_query(self::$connection,$statement);

                if(mysqli_num_rows($res) > 0){
                    $row = mysqli_fetch_assoc($res);
                    if($uname == $row['username']){
                        echo 'Username already exists.';
                    }
                    else if($email == $row['email']){
                        echo 'Email already exists.';
                    }
                    else if($uname != $row['username'] && $email != $row['email']){
                        $LoginRepository = new LoginRepository();
                        $LoginRepository->create($uname, $email, $password);
                        header('Location: /login');
                    }
                }

            }
            else{
                echo 'Those passwords did not match. Try again.';
            }
        }
    }

}