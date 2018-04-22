<?php
require_once '../repository/LoginRepository.php';
/**
 * Controller für das Login und die Registration, siehe Dokumentation im DefaultController.
 */
  class LoginController
  {
    /**
     * Default-Seite für das Login: Zeigt das Login-Formular an
	 * Dispatcher: /login
     */
    public function index()
    {
      $loginRepository = new LoginRepository();
      $view = new View('login_index');
      $view->title = 'Bilder-DB';
      $view->heading = 'Login';
      $view->display();
    }
    /**
     * Zeigt das Registrations-Formular an
	 * Dispatcher: /login/registration
     */
    public function login()
    {

        if(isset($_POST['logincheck']))
        {
            $loginemail = $_POST['loginemail'];
            $loginpassword  = $_POST['loginpassword'];
            //??
            if(!empty($_POST['loginpassword']) & !empty($_POST['loginemail']))
            {
                $LoginRepository = new LoginRepository();
                $valid = $LoginRepository->login($loginemail, $loginpassword);
                if(!empty($valid))
                {
                    $_SESSION['LoggedIn'] = $loginemail;
                    header('Location: /');
                }
                else
                {
                    header('Location: /');
                }
            }
        }
    }
    public function registration()
    {
      $view = new View('login_registration');
      $view->title = 'Bilder-DB';
      $view->heading = 'Registration';
      $view->display();

        if (isset($_POST['regsubmit'])) {
            $email = $_POST['regemail'];
            $password  = $_POST['regpassword'];
            $LoginRepository = new LoginRepository();
            $LoginRepository->create($email, $password);
        }

    }
}
?>