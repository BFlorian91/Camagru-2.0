<?php

  abstract class Model
  {
    public $message;
    private $_db;
    protected $userId;
    protected $userName;

    public function __construct()
    {
      $this->message = new Tools();
      $this->_db = null;
      $this->userId = $_SESSION['userId'];
      $this->userName = $_SESSION['username'];
    }

    public function connect()
    {
      require 'config/database.php';
      try {
        $this->_db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->_db;
      } catch(PDOException $e) {
        echo $this->message->error($e->getMessage());
        return (-1);
      }
    }

    public function checkIfUserExist($username)
    {
      $stmt = $this->_db->prepare("SELECT `username` FROM `users` WHERE username = :username");
      $stmt->bindParam(":username", $username);
      $stmt->execute();

      if($stmt->rowCount() > 0){
        return false;
      }
      return true;
    }

    public function checkIfMailExist($mail)
    {
      $stmt = $this->_db->prepare("SELECT `mail` FROM `users` WHERE `mail` = :mail");
      $stmt->bindParam("mail", $mail);
      $stmt->execute();

      if($stmt->rowCount() > 0){
        return false;
      }
      return true;
    }

    public function checkPassword($password)
    {
      if (preg_match('/[A-Z]/', $password)) {
        if (preg_match('/[0-9]/', $password)) {
          return 1;
        }
        return -1;
      }
      return 0;
    }

    public function getLikedStatus()
    {
      $imageId = filter_input(INPUT_POST, "imageId");

      $stmt = $this->_db->prepare("SELECT * FROM `like` WHERE imageId = :imageId AND userId = :userId");
      $stmt->bindParam(":imageId", $imageId);
      $stmt->bindParam(":userId", $this->userId);
      $stmt->execute();

      while ($row = $stmt->fetch()) {
        if ($imageId == $row[2]) {
          return $row[3];
        }
      }
    }
  }