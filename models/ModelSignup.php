<?php

  class ModelSignup extends Model
  {

    private $_db;

    public function __construct()
    {
      parent::__construct();
      $this->_db = $this->connect();
      $this->_db->exec("USE " . getenv("DB_NAME"));
    }

    public function signup($username, $mail, $password)
    {
      if ($this->passwordStrongy($password) < 1) {
        return $this->message->error("Password must be containe at least 1 Uppercase and 1 digit");
      }
      if ($this->checkIfExist($username, $mail)) {
        $stmt = $this->_db->prepare("INSERT INTO users (`username`, `mail`, `password`, `token`) VALUES (:username, :mail, :passwd, :token)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":passwd", hash("sha512", $password));
        $stmt->bindParam(":token", hash("sha384", $username));
        $stmt->execute();
      } else {
        $this->message->error("Username or Email already taken");
      }
    }

    public function checkIfExist($username, $mail)
    {
      $stmt = $this->_db->prepare("SELECT `username`, `mail` FROM `users` WHERE username='$username' OR `mail`='$mail'");
      $stmt->execute();

      if($stmt->rowCount() > 0){
        return false;
      } else {
        return true;
      }
    }

    public function passwordStrongy($password)
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