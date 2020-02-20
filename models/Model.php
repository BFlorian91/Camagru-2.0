<?php

  class Model
  {
    public $message;
    private $_port;
    private $_user;
    private $_pass;

    public function __construct()
    {
      $this->message = new Tools();
      $this->_port = getenv("DB_PORT");
      $this->_user = getenv("DB_USER");
      $this->_pass = getenv("DB_PASSWORD");
    }

    public function connect()
    {
      try {
        $db = new PDO('mysql:host=fl_mysql;port:' . $this->_port, $this->_user, $this->_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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