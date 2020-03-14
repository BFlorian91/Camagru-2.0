<?php

  class ControllerSignup extends Controller
  {
    public $db;

    public static function createView()
    {
      $view = new ViewSignup();
      $action = new ModelSignup();
  
      if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $action->signup($username, $email, $password);
        $view = new ViewGallery();
        header('Location: explore');
        die();
        // $view->build_page();
        // return true;
      }
      $view->build_page();
    }
  }