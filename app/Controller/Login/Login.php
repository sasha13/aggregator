<?php

namespace Controller\Login;

use Controller\Main\Main;
use Html\Html;
use Db\Db;


class Login extends Main {

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {
    $controllerName = $this->getControllerNameLowercase();
//     $model = loadModel('model_name');
    $data = array('title' => 'Aggregator');
    $html = new Html($controllerName);
    $html->render('index', $data);
  }

  public function view() {
    var_dump($this->data);
  }

  public function process() {
    var_dump($_POST);
  }
}
