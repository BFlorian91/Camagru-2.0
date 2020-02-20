<?php

  class ModelEditAccount extends Model
  {

    public function __construct()
    {
      parent::__construct();
      $this->_db = $this->connect();
      $this->_db->exec("USE " . getenv("DB_NAME"));
    }

    public function editUsername($newUsername)
    {
      if (!isset($newUsername) || !$this->checkIfUserExist($newUsername, $this->_db)) {
        return $this->message->error("Username missing or already exist, please choose another one");
      }
      
      $newToken = hash("sha384", $newUsername);
      $response = $this->_db->query("SELECT `username`, `token`, `id` FROM users");
      while ($datas = $response->fetch()) {
        if ($datas['token'] == $_SESSION['token']) {
          $id = $datas['id'];

          $stmt = $this->_db->prepare("UPDATE `users` SET `username`=?, `token`=? WHERE `id`=?");
          $stmt->execute([$newUsername, $newToken, $id]);

          return true;
        }
      }
    }

    public function editPassword()
    {

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
  }