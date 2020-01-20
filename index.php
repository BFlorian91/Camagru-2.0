<?php

// require_once 'database/DatabaseConnect.php';
$_SESSION['userName'] = 'Florian';

spl_autoload_register(function ($class_name) {
  if (file_exists('views/' . $class_name . '.php')) {
    require_once 'views/' . $class_name . '.php';
  } else if (file_exists('classes/' . $class_name . '.php')) {
    require_once 'classes/' . $class_name . '.php';
  } else if (file_exists('controllers/' . $class_name . '.php')) {
    require_once 'controllers/' . $class_name . '.php';
  }
});

require_once 'Routes.php';