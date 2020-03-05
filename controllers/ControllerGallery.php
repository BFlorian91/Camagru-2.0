<?php

  class ControllerGallery extends Controller
  {
    public static function CreateView() 
    {
      $view = new ViewGallery();
      // $action = new modelGallery();
      // $action->fetchAll();
      $view->build_page();
    }

    public static function getAllImg()
    {
      $action = new modelGallery();
      $action->fetchAllImg();
    }
  }