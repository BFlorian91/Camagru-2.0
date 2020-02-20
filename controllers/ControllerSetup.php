<?php

  class ControllerSetup extends Controller
  {
    public function CreateView()
    {
      $view = new ViewInstall();
      $view->build_page();
    }
  }