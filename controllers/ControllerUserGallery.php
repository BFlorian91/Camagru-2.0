<?php

  class ControllerUserGallery extends Controller
  {
    public function CreateView()
    {
      $view = new ViewUserGallery();
      $view->build_page();
    } 
  }