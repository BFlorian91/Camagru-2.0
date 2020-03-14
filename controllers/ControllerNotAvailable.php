<?php

  class ControllerNotAvailable extends Controller
  {
    public function createView()
    {
      $view = new ViewNotAvailable();
      $view->build_page();
    } 
  }