<?php

class View
{
  protected $_html_element;
  private $_menuItems;

  public function __construct()
  {
    $this->_html_element = null;
    $this->_menuItems = ["Your List", "Contact", "Account", "Signin"];
  }

  public function header()
  { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Camagru</title>
      <link rel="stylesheet" type="text/css" href="../lib/styles/main.css">
      <link rel="stylesheet" type="text/css" href="../lib/styles/card.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
      <!-- Bootstrap core CSS -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
      <!-- Material Design Bootstrap -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    </head>

    <body class="position-relative" style="margin-top: 100px;">
    <?php
  }

  public function navbar()
  { ?>
    <header>
      <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
        <a href="index.php?url=home" style="width: 40px"><img src="../lib/img/logo.png" class="img-fluid" alt="logo"></a>
        <div class="mr-auto">
          <a href="index.php?url=home"><h3 class="mt-1 ml-4 font-weight-bold text-white font-pacifico">Camagru</h3></a>
        </div>
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
          <li class="nav-item">
            <a href="index.php?url=home" class="nav-link"><i class="text-white fas fa-camera"></i><span class="clearfix d-none d-sm-inline-block text-white"></span></a>
          </li>
          <li class="nav-item">
            <a href="index.php?url=signin" class="nav-link"><i class="text-white fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block text-white"></span></a>
          </li>
        </ul>
      </nav>
    </header>
    <?php
  }

  public function body()
  { ?>
    <?php
  }

  public function footer()
  { ?>
      <footer class="font-small">
        <div class="footer-copyright text-center py-2">
          <p>© 2020 Copyright: Florian Beaumont</p>
        </div>
      </footer>
    </body>
    <?php
  }

  public function build_page()
  {
    $this->_html_element = $this->header();
    $this->_html_element .= $this->navbar();
    $this->_html_element .= $this->body();
    $this->_html_element .= $this->footer();

    return $this->_html_element;
  }
}
