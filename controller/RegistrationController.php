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
    /**
     * Default-Seite für das Registration: Zeigt das Registration-Formular an
     * Dispatcher: /registration
     */
    public function index(){
        $view = new View('registration');
        $view->title = 'Bilder-DB';
        $view->heading = 'Registration';
        $view->display();

        if (isset($_POST['regsubmit'])) {
            //passwort regex: https://stackoverflow.com/questions/8141125/regex-for-password-php
            $pregex = "^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$^";
            $uname = htmlspecialchars($_POST['reguname']);
            $email = htmlspecialchars($_POST['regemail']);
            $password  = htmlspecialchars($_POST['regpassword']);
            $redopass = htmlspecialchars($_POST['redopassword']);
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
            else if($password != $redopass){
                echo 'The passwords did not match. Try again.';
            }
        }
    }
}