<?php

namespace Controller\Login;

use Controller\Main\Main;
use Html\Html;
use Db\Db;
use Config\GeneralConfig;
use Utils\Utils;
use Model\Login as ModelLogin;


class Login extends Main {

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

  public function view() {
    var_dump($this->data);
  }

  public function process() {
    $isLoginFormPopulatedCorrectly = Utils::isRegisterFormPopulatedCorrectly();
    if ($isLoginFormPopulatedCorrectly) {
      $data = Utils::prepareDataForUserRegistrationOrLogin();
    } else {
      die('Username and password must be entered.');
    }
    $conn = Db::getConnection();
    $loginCredentialsAreOk = ModelLogin::checkLoginCredentials($conn, $data);
    if (!$loginCredentialsAreOk) {
      Utils::redirect('/login');
    } else {
      $userId = $loginCredentialsAreOk['user_id'];
      Utils::redirect("/user/view/{$userId}");
    }
  }
}
