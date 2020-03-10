<?php

  $message = new Tools();

  // CREATE DATABASE 
  try {
    $db = new PDO('mysql:host=localhost;port:8889', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("DROP DATABASE IF EXISTS " . DB_NAME);
    $db->exec("CREATE DATABASE " . DB_NAME);
    echo $message->success("Database is installed!");

  } catch(PDOException $e) {
    echo  $message->error($e->getMessage());
    die(-1);
  }

  // CREATE USERS TABLES 
  try {
    $db->exec("USE " . DB_NAME);
    $db->exec("CREATE TABLE `users` (
      `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `username` VARCHAR(50) NOT NULL,
      `mail` VARCHAR(100) NOT NULL,
      `password` VARCHAR(255) NOT NULL,
      `token` VARCHAR(255) NOT NULL,
      `verified` VARCHAR(1) NOT NULL DEFAULT '0',
      `mailNotif` VARCHAR(1) NOT NULL DEFAULT '1'   
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
      `userId` INT(11) NOT NULL,
      `imgDate` DATETIME NOT NULL,
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
      `userId` INT(11) NOT NULL,
      `imageId` INT(11) NOT NULL,
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
      `userId` INT(11) NOT NULL,
      `galleryId` INT(11) NOT NULL,
      `comment` VARCHAR(255) NOT NULL,
      FOREIGN KEY (userId) REFERENCES users(id),
      FOREIGN KEY (galleryId) REFERENCES gallery(id)  
    )");
    echo $message->success("Comment TABLE has been created!");
  } catch(PDOException $e) {
    echo $message->error($e->getMessage());
    die(-1);
  }

  try {
    $password = hash("sha512", 'r@@t123X');
    $db->exec("INSERT INTO users (`username`, `mail`, `password`, `token`, `verified`)
      VALUES
      ('Admin', 'florianbeaumont412@gmail.com','$password', '1', '1')
    ");
  } catch(PDOException $e) {
    echo $message->error($e->getMessage());
    die(-1);
  }