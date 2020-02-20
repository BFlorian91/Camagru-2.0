<?php

  class ControllerSignin extends Controller
  {
    private $_action;
    public $db;

    public function __construct()
    {

    }

    public static function CreateView()
    {
      $view = new ViewSignin();
      // $action = new ModelSignin();

      if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        // $action->signin($email, $password);
      }
      $view->build_page();
    }
  }