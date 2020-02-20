<?php

  class ControllerNotAvailable extends Controller
  {
    public function CreateView()
    {
      $view = new ViewNotAvailable();
      $view->build_page();
    } 
  }