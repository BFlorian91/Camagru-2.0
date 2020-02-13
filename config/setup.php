<?php

  $message = new Tools();
  
  try {
    // phpinfo();
    // die();
    $db = new PDO('mysql:host=fl_mysql;port:8081', 'root', 'r@@t123X');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("DROP DATABASE IF EXISTS camagru");
    $db->exec("CREATE DATABASE camagru");
    echo $message->success("Database is installed!");

  } catch(PDOException $e) {
    echo  $message->error($e->getMessage());
    // die();
  }