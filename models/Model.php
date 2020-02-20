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
      // var_dump($this->_port, $this->_user, $this->_pass);
      try {
        $db = new PDO('mysql:host=fl_mysql;port:' . $this->_port, $this->_user, $this->_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
      } catch(PDOException $e) {
        echo $this->message->error($e->getMessage());
        die(-1);
      }
    }
  }