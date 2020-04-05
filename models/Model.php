<?php

  abstract class Model
  {
      private $_db;
      protected $userIsConnected;
      protected $message;
      protected $userId;
      protected $userName;

      public function __construct()
      {
          $this->_db = null;
          $this->message = new Tools();
          $this->userId = $_SESSION['userId'];
          $this->userName = $_SESSION['username'];
          $this->userIsConnected = trim($_SESSION['userId']) != "" ? 1 : 0;
      }

      public function connect()
      {
          require 'config/database.php';
          try {
              $this->_db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
              $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              return $this->_db;
          } catch (PDOException $e) {
              echo $this->message->error($e->getMessage());

              return -1;
          }
      }

      public function checkIfUserExist($username)
      {
          $stmt = $this->_db->prepare('SELECT `username` FROM `users` WHERE username = :username');
          $stmt->bindParam(':username', $username);
          $stmt->execute();

          if ($stmt->rowCount() > 0) {
              return false;
          }

          return true;
      }

      public function checkIfMailExist($mail)
      {
          $stmt = $this->_db->prepare('SELECT `mail` FROM `users` WHERE `mail` = :mail');
          $stmt->bindParam('mail', $mail);
          $stmt->execute();

          if ($stmt->rowCount() > 0) {
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

      public function getImagesID()
      {
          // REQUEST ALL IMGID
          $stmt = $this->_db->prepare('SELECT id FROM gallery ORDER BY id DESC');
          $stmt->execute();

          return $stmt->fetchAll();
      }

      public function responseJson($success, $message = NULL, $datas)
      {
          header('Content-Type: application/json');

          $array["success"] = $success;
          $array["msg"] = $message;
          $array["datas"] = $datas;

          echo json_encode($array);
      }

      public function getUsername($userId)
      {
          try {
              $stmt = $this->_db->prepare('SELECT * FROM users WHERE id LIKE :userId');
              $stmt->bindParam(":userId", $userId);
              $stmt->execute();

              while ($rows = $stmt->fetch()) {
                  $username = $rows[1];
              }
              return $username;
          } catch(Throwable $e) {
              echo $this->message->error($e);
          }
      }
  }
