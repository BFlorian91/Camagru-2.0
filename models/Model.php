<?php

  abstract class Model
  {
    public $message;

    public function __construct()
    {
      $this->message = new Tools();
    }

    public function connect()
    {
      try {
        $db = new PDO('mysql:host=localhost;port:8889', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("USE " . DB_NAME);
        return $db;
      } catch(PDOException $e) {
        echo $this->message->error($e->getMessage());
        die(-1);
      }
    }

    public function checkIfUserExist($username, $db)
    {
      $stmt = $db->prepare("SELECT `username` FROM `users` WHERE username='$username'");
      $stmt->execute();

      if($stmt->rowCount() > 0){
        return false;
      } else {
        return true;
      }
    }

    public function checkIfMailExist($mail, $db)
    {
      $stmt = $db->prepare("SELECT `mail` FROM `users` WHERE `mail`='$mail'");
      $stmt->execute();

      if($stmt->rowCount() > 0){
        return false;
      } else {
        return true;
      }
    }

    public function checkPassword($password)
    {
      if (preg_match('/[A-Z]/', $password)) {
        if (preg_match('/[0-9]/', $password)) {
          return 1;
        }
        return -1;
      } else {
        return 0;
      }
    }
}