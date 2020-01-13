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
      <title>Todo</title>
      <link rel="stylesheet" type="text/css" href="../lib/styles/main.css">
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

    <body style="margin-top: 100px">
    <?php
  }

  public function navbar()
  { ?>
    <header>
      <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
        <a href="index.php?url=home" style="width: 40px"><img src="../lib/img/logo.png" class="img-fluid" alt="logo"></a>
        <div class="mr-auto">
          <a href="index.php?url=home"><h3 class="mt-1 ml-4 font-weight-bold text-white font-pacifico">TodoApp</h3></a>
        </div>
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
          <li class="nav-item">
            <a href="index.php?url=home" class="nav-link"><i class="fas fa-home text-white"></i><span class="clearfix d-none d-sm-inline-block text-white">Your list</span></a>
          </li>
          <!-- <li class="nav-item">
            <a href="index.php?url=contact-us" class="nav-link"><i class="fas fa-envelope text-white"></i><span class="clearfix d-none d-sm-inline-block text-white">Contact</span></a>
          </li> -->
          <li class="nav-item">
            <a href="index.php?url=signin" class="nav-link"><i class="fas fa-sign-in-alt text-white"></i><span class="clearfix d-none d-sm-inline-block text-white">Signin</span></a>
          </li>
          <li class="nav-item dropleft">
            <a class="nav-link" href="index.php?url=signin" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="text-white fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block text-white">Account</span>
            </a>
            </li>
          </ul>
        </nav>
      </header>
    <?php
  }

  public function body()
  { ?>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
    </body>
    <?php
  }

  public function footer()
  { ?>
    <footer class="page-footer font-small fixed-bottom">

      <div class="footer-copyright text-center py-2">
        <p>©2020 Copyright: Florian Beaumont</p>
      </div>

    </footer>
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
