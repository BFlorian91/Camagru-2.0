<?php

// ini_set('session.save_path',getcwd());
// ini_set('session.save_path', '/server/session');
session_start();

require_once 'lib/Tools.php';
require_once 'config/database.php';

spl_autoload_register(function ($class_name) {
  if (file_exists('views/' . $class_name . '.php')) {
    require_once 'views/' . $class_name . '.php';
  } else if (file_exists('classes/' . $class_name . '.php')) {
    require_once 'classes/' . $class_name . '.php';
  } else if (file_exists('models/' . $class_name . '.php')) {
    require_once 'models/' . $class_name . '.php';
  } else if (file_exists('controllers/' . $class_name . '.php')) {
    require_once 'controllers/' . $class_name . '.php';
  }
});

require_once 'models/api/Images.php';
require_once 'models/api/Comments.php';
require_once 'Routes.php';