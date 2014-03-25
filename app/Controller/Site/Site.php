<?php

namespace Controller\Site;

use Controller\Main\Main;
use Html\Html;
use Utils\Utils;

class Site extends Main {

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {
    session_start();
    var_dump($_SESSION);
    $controllerName = $this->getControllerNameLowercase();
    $data = array('title' => 'Agggggregator');
    $html = new Html($controllerName);
    if (Utils::isUserLoggedIn()) {
      $html->render('index_auth');
    } else {
      $html->render('index', $data);
    }
  }

}
