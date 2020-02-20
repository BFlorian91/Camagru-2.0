<?php

  class ControllerLogout extends Controller
  {
    public function CreateView()
    {
      $view = new ViewGallery();
      if (trim($_SESSION['token'])) {
        $_SESSION['token'] = "";
        session_destroy();
      }
      $view->build_page();
    }
  }