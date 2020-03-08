<?php

  class ModelSignup extends Model
  {

    private $_db;

    public function __construct()
    {
      parent::__construct();
      $this->_db = $this->connect();
    }

    public function signup($username, $mail, $password)
    {
      $username = ucfirst($username);
      if ($this->checkPassword($password) < 1) {
        return $this->message->error("Password must be containe at least 1 Uppercase and 1 digit");
      }
      if ($this->checkIfUserExist($username, $this->_db) && $this->checkIfMailExist($mail, $this->_db)) {
        $stmt = $this->_db->prepare("INSERT INTO users (`username`, `mail`, `password`, `token`) VALUES (:username, :mail, :passwd, :token)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":passwd", hash("sha512", $password));
        $stmt->bindParam(":token", hash("sha512", $username));
        $stmt->execute();
      } else {
        return $this->message->error("Username or Email already taken");
      }
    }
  }