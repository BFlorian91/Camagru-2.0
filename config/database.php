<?php

  $DB_DSN = "mysql:dbname=" . getenv('DB_NAME') . ";port=" . getenv('DB_PORT') . ";host=" . getenv('DB_HOST');
  $DB_USER = getenv("DB_USER");
  $DB_PASSWORD = getenv("DB_PASSWORD");