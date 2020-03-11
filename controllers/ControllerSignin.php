<?php

  class ControllerSignin extends Controller
  {
    public static function CreateView()
    {
      $view = new ViewSignin();
      $action = new ModelSignin();

      if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        if ($action->signin($username, $password)) {
          $view = new ViewGallery();
          header('Location: explore');
          die();
        }
      }
      $view->build_page();
    }
  }