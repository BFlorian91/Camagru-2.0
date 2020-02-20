<?php

  class ControllerMontage extends Controller
  {
    public function CreateView()
    {
      $view = new ViewMontage();
      $view->build_page();
    }
  }