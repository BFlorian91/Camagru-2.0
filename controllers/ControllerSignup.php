<?php

  class ControllerSignup extends Controller
  {
      public function __construct()
      {
          parent::__construct();
      }

      public function signup()
      {
          $view = new ViewSignup();
          $action = new ModelSignup();

          $username = htmlspecialchars(filter_input(INPUT_POST, 'username'));
          $password = htmlspecialchars(filter_input(INPUT_POST, 'password'));
          $mail = htmlspecialchars(filter_input(INPUT_POST, 'email'));

          if (! (empty($username) && empty($mail) && empty($password))) {
              if ($mail === false) {
                  echo $this->message->error('invalid email format !');
                  $view->build_page();

                  return false;
              }
              $action->signup($username, $mail, $password);
          }
          $view->build_page();
      }
  }
