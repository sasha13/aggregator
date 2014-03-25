<?php

namespace Controller\Logout;

use Controller\Main\Main;
use Utils\Utils;

class Logout extends Main {

  //public function __construct($data) {
  //  $this->data = $data;
  //}

  public function index() {
    //session_start();
    setcookie(session_name(), '', time() - 42000);
    unset($_SESSION);
    session_destroy();
    Utils::redirect("/");
    //var_dump(session_name());
  }

}
