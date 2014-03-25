<?php

namespace Controller\Login;

use Controller\Main\Main;
use Html\Html;
use Db\Db;
use Utils\Utils;
use Model\Login as ModelLogin;
use Model\User as ModelUser;


class Login extends Main {

  public function __construct() {}

  public function index() {
    $controllerName = $this->getControllerNameLowercase();
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
      session_start();
      $userId = $loginCredentialsAreOk['user_id'];
      $username = ModelUser::getUserName($userId);
      $_SESSION['member'] = $username;
      Utils::redirect("/user/view/{$userId}");
    }
  }

}
