<?php

  class ControllerSetup extends Controller
  {
    public function createView()
    {
      $view = new ViewInstall();
      $view->build_page();
    }
  }