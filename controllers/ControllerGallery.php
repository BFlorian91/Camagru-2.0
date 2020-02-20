<?php

  class ControllerGallery extends Controller
  {
    public static function CreateView() 
    {
      $view = new ViewGallery();
      $view->build_page();
    }
  }