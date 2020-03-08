<?php

  class ModelEditAccount extends Model
  {

    public function __construct()
    {
      parent::__construct();
      $this->_db = $this->connect();
    }

    public function editUsername($newUsername)
    {
      if (!isset($newUsername) || !$this->checkIfUserExist($newUsername, $this->_db)) {
        return $this->message->error("Username missing or already exist, please choose another one");
      }
      
      $newToken = hash("sha512", $newUsername);
      $response = $this->_db->query("SELECT `username`, `token`, `id` FROM users");
      while ($datas = $response->fetch()) {
        if ($datas['token'] == $_SESSION['token']) {
          $id = $datas['id'];

          $stmt = $this->_db->prepare("UPDATE `users` SET `username`=?, `token`=? WHERE `id`=?");
          $stmt->execute([$newUsername, $newToken, $id]);
          $_SESSION['token'] = $newToken;

          return true;
        }
      }
    }

    public function editPassword($newPassword, $confirmPassword)
    {
      if (!isset($newPassword) && !isset($confirmPassword)) {
        return $this->message->error("Password missing");
      } else if ($newPassword != $confirmPassword || $this->checkPassword($newPassword) < 1) {
        return $this->message->error("New password and confirm password must be the same and contain at least 1 uppercase, 1 digit and 8+ characters");
      }

      $response = $this->_db->query("SELECT `password`, `token`, `id` FROM users");
      while ($datas = $response->fetch()) {
        if ($datas['token'] == $_SESSION['token']) {
          $id = $datas['id'];

          $stmt = $this->_db->prepare("UPDATE `users` SET `password`=? WHERE `id`=?");
          $stmt->execute([hash("sha512", $newPassword), $id]);

          return true;
        }
      }
    }

    public function editEmail($newEmail)
    {
      if (!isset($newEmail) || !$this->checkIfMailExist($newEmail, $this->_db)) {
        return $this->message->error("Mail missing or already use, please choose another one");
      }

      $response = $this->_db->query("SELECT `mail`, `token`, `id` FROM users");
      while ($datas = $response->fetch()) {
        if ($datas['token'] == $_SESSION['token']) {
          $id = $datas['id'];

          $stmt = $this->_db->prepare("UPDATE `users` SET `mail`=? WHERE `id`=?");
          $stmt->execute([$newEmail, $id]);

          return true;
        }
      }
    }

    public function mailNotif($status) 
    {
      $response = $this->_db->query("SELECT `token`, `id` FROM `users`");
      while ($datas = $response->fetch()) {
        if ($datas['token'] == $_SESSION['token']) {
          $id = $datas['id'];
          $stmt = $this->_db->prepare("UPDATE users SET `mailNotif`=? WHERE `id`=?");
          $stmt->execute([$status, $id]);
        }
      }
    }

    public function checkStatusMailNotification()
    {
      $response = $this->_db->query("SELECT `token`, `mailNotif` FROM `users`");
      while ($datas = $response->fetch()) {
        if ($datas['token'] == $_SESSION['token']) {
          if ($datas['mailNotif'] == 1) {
            $_SESSION['mailNotif'] = 1;
          } else if ($datas['mailNotif'] == 2) {
            $_SESSION['mailNotif'] = 2;
          }
        }
      }

    }
  }