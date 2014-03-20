<?php

namespace Controller\User;

use Controller\Main\Main;
use Model\User as ModelUser;
use Html\Html;


class User extends Main {

  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {
    die('User/index');
  }

  public function view() {
    $controllerName = $this->getControllerNameLowercase();
    $username = ModelUser::getUserName($this->data['id']);
    $data = array('title' => "Welcome {$username}");
    $html = new Html($controllerName);
    $html->render('view', $data);
  }
}
