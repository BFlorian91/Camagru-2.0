<?php

  class ControllerSignin extends Controller
  {
    public static function signin() 
    {
      if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
      }
    }
  }