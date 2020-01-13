<?php

  class InstallDb
  {
    private $_db;

    public function __construct()
    {
      $this->_db = new DatabaseConnect();
    }

  }