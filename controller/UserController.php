<?php
require_once '../repository/LoginRepository.php';
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 17.05.2018
 * Time: 08:38
 */

class UserController
{
    public function index()
    {

        $LoginRepository = new LoginRepository();
        $view = new View('user');
        $view->title = 'Bilder-DB';
        $view->heading = 'My Profile';
        $view->user = $LoginRepository->getbyEmail($_SESSION['loginEmail']);
        $view->display();

        $pregex = "^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$^";

        if(isset($_POST['changeinput'])){
            $username = $_POST['changeuname'];
            $email = $_POST['changeemail'];
            $password = $_POST['changepassword'];
            $user = $LoginRepository->getbyEmail($_SESSION['loginEmail']);
            if(!empty($_POST['changeuname'])){
                if($LoginRepository->existingUsername($username) == false){
                    $LoginRepository->changeUsername($username, $user->id);
                    echo 'Username changed to: ' . $username;
                }
                else{
                    echo 'Username already exists.';
                    echo '<br>';
                }
            }
            if(!empty($_POST['changeemail'])){
                if($LoginRepository->existingEmail($email) == false){
                    $LoginRepository->changeEmail($email, $user->id);
                    echo 'Email changed to: ' . $email;
                }else{
                    echo 'Email already exists.';
                    echo '<br>';
                }
            }
            if(!empty($_POST['changepassword'])){
                if(preg_match($pregex,$password)){
                    $LoginRepository->changePassword($password, $user->id);
                    echo 'Password changed.';
                }
                else{
                    echo 'Your password needs to have the following: 1 Upper and lowercase, a digit, a special character and consists of 8 characters.';
                }
            }
            if(empty($_POST['changeuname']) && empty($_POST['changeemail']) && empty($_POST['changepassword'])){
                echo 'Atleast one field should be filled.';
            }
        }
        else if (isset($_POST['deleteacct'])){
            $this->delete();
            session_destroy();
            session_unset($_SESSION['loginEmail']);
            session_unset($_SESSION['isAdmin']);

            header('Location: /');
        }
    }

    public function delete()
    {
        $LoginRepository = new LoginRepository();
        $LoginRepository->deleteById($_GET['id']);
        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /allusers');
    }

}