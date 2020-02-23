<?php

  class ModelMontage extends Model
  {

    public function __construct()
    {
      parent::__construct();
      $this->_db = $this->connect();
      $this->_db->exec("USE " . getenv("DB_NAME"));
    }

    public function uploadImage($file)
    {
      if (empty($file['name'])) {
        return $this->message->error("No file chosen");
      }
      $name = explode(".", $file['name']);
      $extensions = ['jpg', 'jpeg', 'png'];
      $weight = 3072;
      
      var_dump($file['name']);
    }
  }