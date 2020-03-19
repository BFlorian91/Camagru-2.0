<?php
class ControllerLogout extends Controller
{
  public function logout()
  {
    $view = new ViewGallery();
    if (trim($_SESSION['token'])) {
      $_SESSION['token'] = "";
      $_SESSION['username'] = "";
      $_SESSION['mailNotif'] = "";
      session_destroy();
    }
    $view->build_page();
  }
}