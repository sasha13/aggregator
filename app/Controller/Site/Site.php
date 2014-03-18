<?php

namespace Controller\Site;

use Controller\Main\Main;
use Html\Html;

class Site extends Main {

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {
    //Html::layout = 'main';
    $controllerName = $this->getControllerNameLowercase();
    var_dump(dirname(__DIR__));
    var_dump($controllerName);
//     $model = loadModel('model_name');
    $html = new Html($controllerName);
    $html->render('index', array('username' => 'sasha'));
  }

}
