<?php

  class ControllerAccountEdit extends Controller
  {
    public function CreateView()
    {
      $view = new ViewAccountEdit();
      $view->build_page();
    }
  }