<?php

namespace Controller\Site;

use Controller\Main\Main;

class Site extends Main {

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {
    //Html::layout = 'main';
    $a = $this->getControllerName($this);
    var_dump(dirname(__DIR__));
//     $model = loadModel('model_name');
//     Html::render('view_name', array());
  }

}
