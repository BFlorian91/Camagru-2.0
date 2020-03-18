<?php

  abstract class Model
  {
    public $message;
    protected $userId;
    protected $userName;

    public function __construct()
    {
      $this->message = new Tools();
      $this->userId = $_SESSION['userId'];
      $this->userName = $_SESSION['username'];
    }

    public function connect()
    {
      require 'config/database.php';
      try {
        $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
      } catch(PDOException $e) {
        echo $this->message->error($e->getMessage());
        return (-1);
      }
    }

    public function checkIfUserExist($username, $db)
    {
      $stmt = $db->prepare("SELECT `username` FROM `users` WHERE username = :username");
      $stmt->bindParam(":username", $username);
      $stmt->execute();

      if($stmt->rowCount() > 0){
        return false;
      }
      return true;
    }

    public function checkIfMailExist($mail, $db)
    {
      $stmt = $db->prepare("SELECT `mail` FROM `users` WHERE `mail` = :mail");
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
      $db = $this->connect();
      $imageId = filter_input(INPUT_POST, "imageId");

      $stmt = $db->prepare("SELECT * FROM `like` WHERE imageId = :imageId AND userId = :userId");
      $stmt->bindParam(":imageId", $imageId);
      $stmt->bindParam(":userId", $this->userId);

      while ($row = $stmt->fetch()) {
        if ($imageId == $row[2]) {
          return $row[3];
        }
      }
    }
  }