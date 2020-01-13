<?php

class Controller
{
  
  public static function CreateView($viewName)
  {
    $view = new $viewName();
    $view->build_page();
  }

  // public static function routes()
  // {
  //   $page = isset($_GET["page"]) ? $_GET["page"] : null;
  //   switch ($page) {
  //     case "contact":
  //       $route = new ControllerContact();
  //       break;
  //     case "list":
  //       $route = new ControllerList();
  //     break;
  //     default:
  //       $route = new ControllerHome();
  //       break;
  //   }
  //   return $route;
  // }

  // public function start()
  // { }

  // public function getView()
  // {
  //   return $this->_view;
  // }
}
