<?php

  class DatabaseConnect
  {
    private $_dsn;
    private $_database;
    private $_port;
    private $_host;
    private $_user;
    private $_passwd;
    private $_pdo;
    
    public function __construct()
    {
      $this->_database = getenv('DB_DATABASE');
      $this->_port = getenv('DB_PORT');
      $this->_host = getenv('DB_SERVER');
      $this->_user = getenv('DB_USER');
      $this->_passwd = getenv('DB_PASSWORD');
      $this->_pdo = null;
      
      $this->_dsn = "mysql:dbname$this->_database;port=$this->_port;host=$this->_host";
    }

    public function connectToDb()
    {
      try {
        $this->_pdo = new PDO($this->_dsn, $this->_user, $this->_passwd);
      } catch (PDOException $err) {
        echo "Connection failed: " . $err->getMessage();
      }
    }
  }