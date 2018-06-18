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
      $view = new View('login');
      $view->title = 'Bilder-DB';
      $view->heading = 'Login';
      $view->display();

      if(isset($_POST['logincheck']))
      {
          $loginemail = htmlspecialchars($_POST['loginemail']);
          $loginpassword  = htmlspecialchars($_POST['loginpassword']);

          if((!empty($_POST['loginpassword']) & !empty($_POST['loginemail'])) && filter_var($loginemail, FILTER_VALIDATE_EMAIL))
          {
              $LoginRepository = new LoginRepository();
              $valid = $LoginRepository->login($loginemail, $loginpassword);
              if(!empty($valid))
              {
                  $_SESSION['loginEmail'] = $loginemail;
                  if ($loginemail == "jclt.laffan@yahoo.com" || $loginemail == "jericoluislua@yahoo.com.ph"){
                      $_SESSION['isAdmin'] = $loginemail;
                  }
                  header('Location: /');
              }
              else{
                  echo 'Wrong Password or Email. Try Again.';
              }
          }
          else if(!filter_var($loginemail, FILTER_VALIDATE_EMAIL)){
              echo 'Not valid email.';
          }
      }
    }

}
?>