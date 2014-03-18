<?php

namespace Controller\Register;

use Controller\Main\Main;
use Html\Html;


class Register extends Main {

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {
    $controllerName = $this->getControllerNameLowercase();
//     $model = loadModel('model_name');
    $html = new Html($controllerName);
    $html->render('index', array('username' => 'sasha'));
  }

  public function view() {
    var_dump($this->data);
  }

  public function process() {
    var_dump($_POST);
  }

}
