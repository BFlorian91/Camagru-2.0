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
      $this->_database = getenv('DB_NAME');
      $this->_port = getenv('DB_PORT');
      $this->_host = getenv('DB_HOST');
      $this->_user = getenv('DB_USER');
      $this->_passwd = getenv('DB_PASSWORD');
      $this->_pdo = null;
      
      $this->_dsn = "mysql:dbname=$this->_database;port=$this->_port;host=$this->_host";
    }

    public function showInfo()
    {
      echo "DB_NAME: " . $this->_database . "</br>";
      echo "DB_PORT: " . $this->_port . "</br>";
      echo "DB_HOST: " . $this->_host . "</br>";
      echo "DB_USER: " . $this->_user . "</br>";
      echo "DB_PASSWORD: " . $this->_passwd . "</br>";
      echo "</hr></br>";
      echo $this->_dsn . "</br>";
      echo "User: " . $this->_user . "</br>Password: " . $this->_passwd . "</br></br>";
    }

    public function connectToDb()
    {
      try {
        $this->_pdo = new PDO($this->_dsn, $this->_user, $this->_passwd);
        echo ("SUCCESS !!");
      } catch (PDOException $err) {
        echo "Connection failed: " . $err->getMessage() . "</br></br>";
      }
    }
  }