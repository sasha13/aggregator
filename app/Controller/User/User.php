<?php

namespace Controller\User;

use Controller\Main\Main;
use Model\User as ModelUser;
use Html\Html;
use Controller\Login\Login;
use Utils\Utils;


class User extends Main {

  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {
    die('User/index');
  }

  public function view() {
    session_start();
    $controllerName = $this->getControllerNameLowercase();
    $username = ModelUser::getUserName($this->data['id']);
    if (!Utils::isUserLoggedIn()) {
      Utils::redirect('/login');
    }
    var_dump($_SESSION);
    var_dump($_COOKIE);
    $data = array('title' => "Welcome {$username}");
    $html = new Html($controllerName);
    $html->render('view', $data);
  }
}
