<?php

  class ModelSignin extends Model
  {
    private $_db;

    public function __construct()
    {
      parent::__construct();
      $this->_db = $this->connect();
      $this->_db->exec("USE " . DB_NAME);
    }

    public function signin($username, $pass)
    {
      $username = ucfirst($username);
      $password = hash("sha512", $pass);
      $response = $this->_db->query("SELECT `id`, `username`, `password`, `token` FROM users");
      while ($datas = $response->fetch()) {
        if ($datas['username'] == $username && $datas['password'] == $password) {
          session_start();
          $_SESSION['token'] = $datas['token'];
          $_SESSION['username'] = $datas['username'];
          $_SESSION['userId'] = $datas['id'];
          return true;
        }
      }
      return $this->message->error("Username or/and Password are invalides");
    }
  }