<?php

  class ControllerGallery extends Controller
  {

    private $_action;

    public function __construct()
    {
      $this->_action = new ModelGallery();
    }

    public static function gallery()
    {
      $view = new ViewGallery();
      $view->build_page();
    }

    public function userGallery()
    {
      $view = new ViewUserGallery();
      $view->build_page();
    } 

    public function getAllImg()
    {
      // die($this->_action . "OK");
      $action = new ModelGallery();
      $action->fetchAllImg();
      // $this->_action->fetchAllImg();
    }

    public function getUserImg()
    {
      $action = new ModelGallery();
      $action->fetchUserImg();
    }

    // inprogress
    public function like()
    {
      if (isset($_POST["imageId"])) {
        die("coucou");
        $action = new ModelGallery();
        $action->likeGestion();
      }
    }
    ///////////////
    public function comment()
    {
      $view = new ViewComment();
      $action = new ModelGallery();

      $view->build_page();
      
    }
  }