<?php

  class ControllerSignin extends Controller
  {
      public function signin()
      {
          $view = new ViewSignin();
          $action = new ModelSignin();

          $username = htmlspecialchars(filter_input(INPUT_POST, 'username'));
          $password = htmlspecialchars(filter_input(INPUT_POST, 'password'));

          if (! (empty($username) && empty($password))) {
              $action->signin($username, $password);
          }
          $view->build_page();
      }
  }
