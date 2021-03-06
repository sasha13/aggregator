<?php

namespace Controller\Register;

use Controller\Main\Main;
use Html\Html;
use Db\Db;
use Utils\Utils;
use Model\Register as ModelRegister;


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
    $conn = Db::getConnection();
    $username = $_POST['username'];
    $isRegisterFormPopulatedCorrectly = Utils::isRegisterFormPopulatedCorrectly();
    if ($isRegisterFormPopulatedCorrectly) {
      $usernameExists = Utils::checkIfUsernameExists($conn, $username);
      if ($usernameExists) {
        die('Username exists.');
      } else {
        $data = Utils::prepareDataForUserRegistrationOrLogin();
      }
    } else {
      die('Username and password must be entered.');
    }
    ModelRegister::registerUser($conn, $data);
  }

}
