<?php

  class ControllerSetup extends Controller
  {
    public function setup()
    {
      $view = new ViewInstall();
      $view->build_page();
    }
  }