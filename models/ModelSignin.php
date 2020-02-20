<?php

  class ModelSignin extends Model
  {
    private $_db;

    public function __construct()
    {
      parent::__construct();
      $this->_db = $this->connect();
      $this->_db - $this->_db->exec("USE " . getenv("DB_NAME"));
    }

    public function signin($username, $pass)
    {
      $password = hash("sha512", $pass);
      $response = $this->_db->query("SELECT `username`, `password`, `token` FROM users");
      while ($datas = $response->fetch()) {
        if ($datas['username'] == $username && $datas['password'] == $password) {
          $_SESSION['token'] = $datas['token'];
          $this->message->success($_SESSION['token']);
          return true;
        }
      }
      return $this->message->error("Username or/and Password are invalides");
    }
  }