<?php

namespace Controller\Register;

use Controller\Main\Main;
use Html\Html;
use Db\Db;
use Utils\Utils;


class Register extends Main {

  //public function __construct($data) {
  //  $this->data = $data;
  //}

  public function index() {
    $controllerName = $this->getControllerNameLowercase();
//     $model = loadModel('model_name');
    $data = array('title' => 'Aggregator');
    $html = new Html($controllerName);
    $html->render('index', $data);
  }

  public function view(){}

  public function process() {
    $isRegisterFormPopulatedCorrectly = Utils::isRegisterFormPopulatedCorrectly();
    if ($isRegisterFormPopulatedCorrectly) {
      $data = Utils::prepareDataForUserRegistrationOrLogin();
    } else {
      die('Username and password must be entered.');
    }
    $conn = Db::getConnection();
    Db::registerUser($conn, $data);
  }

}
