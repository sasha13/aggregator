<?php

namespace Controller\Site;

use Controller\Main\Main;
use Html\Html;

class Site extends Main {

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {
    //var_dump($_SERVER);die();
    $controllerName = $this->getControllerNameLowercase();
//     $model = loadModel('model_name');
    $data = array('title' => 'Agggggregator');
    $html = new Html($controllerName);
    $html->render('index', $data);
  }

}
