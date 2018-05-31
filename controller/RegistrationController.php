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
            $pregex = "^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$^";
            $uname = $_POST['reguname'];
            $email = $_POST['regemail'];
            $password  = $_POST['regpassword'];
            $redopass = $_POST['redopassword'];
            if ($password == $redopass){
                if(preg_match($pregex, $password)){
                    $LoginRepository = new LoginRepository();
                    if($LoginRepository->existingEmail($email) == true){
                        echo 'Email already exists.';
                    }
                    if($LoginRepository->existingUsername($uname) == true){
                        echo '<br> Username already exists.';
                    }
                    if($LoginRepository->existingEmail($email) == false && $LoginRepository->existingUsername($uname) == false){
                        $LoginRepository->create($uname, $email, $password);
                        header('Location: /login');
                    }
                }
                else{
                    echo 'Your password needs to have the following: 1 Upper and lowercase, a digit, a special character and consists of 8 characters.';
                }
            }
            else if($password == $redopass){
                echo 'The passwords did not match. Try again.';
            }
        }
    }
}