<?php

  $message = new Tools();
  $dbName = getenv("DB_NAME");
  $port = getenv("DB_PORT");
  $user = getenv("DB_USER");
  $password = getenv("DB_PASSWORD");

  // CREATE DATABASE 
  try {
    $db = new PDO('mysql:host=fl_mysql;port:' . $port, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("DROP DATABASE IF EXISTS " . $dbName);
    $db->exec("CREATE DATABASE " . $dbName);
    echo $message->success("Database is installed!");

  } catch(PDOException $e) {
    echo  $message->error($e->getMessage());
    die(-1);
  }

  // CREATE USERS TABLES 
  try {
    $db->exec("USE " . $dbName);
    $db->exec("CREATE TABLE `users` (
      `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `username` VARCHAR(50) NOT NULL,
      `mail` VARCHAR(100) NOT NULL,
      `password` VARCHAR(255) NOT NULL,
      `token` VARCHAR(100) NOT NULL,
      `verified` VARCHAR(1) NOT NULL DEFAULT '0'  
    )");
    echo $message->success("Users TABLE has been created!");
  } catch (PDOException $e) {
    echo $message->error($e->getMessage());
    die(-1);
  }

  // CREATE TABLE GALLERY
  try {
    $db->exec("CREATE TABLE `gallery` (
      `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `img` VARCHAR(100) NOT NULL,
      `userId` INT(12) NOT NULL,
      FOREIGN KEY (userId) REFERENCES users(id)
    )");
    echo $message->success("Gallery TABLE has been created!");
  } catch(PDOException $e) {
    echo $message->error($e->getMessage());
    die(-1);
  }

  // CREATE TABLE LIKES
  try {
    $db->exec("CREATE TABLE `like` (
      `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `userId` INT(12) NOT NULL,
      `galleryId` INT(12) NOT NULL,
      `liked` VARCHAR(1) NOT NULL DEFAULT '0',
      FOREIGN KEY (userId) REFERENCES users(id),
      FOREIGN KEY (galleryId) REFERENCES gallery(id)
    )");
    echo $message->success("Like TABLE has been created!");
  } catch(PDOException $e) {
    echo $message->error($e->getMessage());
    die(-1);
  }

  // CREATE TABLE COMMENT
  try {
    $db->exec("CREATE TABLE `comment` (
      `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `userId` INT(12) NOT NULL,
      `galleryId` INT(12) NOT NULL,
      `comment` VARCHAR(255) NOT NULL,
      FOREIGN KEY (userId) REFERENCES users(id),
      FOREIGN KEY (galleryId) REFERENCES gallery(id)  
    )");
    echo $message->success("Comment TABLE has been created!");
  } catch(PDOException $e) {
    echo $message->error($e->getMessage());
    die(-1);
  }