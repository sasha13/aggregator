<?php

namespace Controller\Register;

use Controller\Main\Main;
use Html\Html;
use Db\Db;


class Register extends Main {

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

  public function view(){}

  public function process() {
    var_dump($_POST);
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $salt = 'th1rt33n';
      $saltedPassword = md5($salt . $password);

      $conn = Db::getConnection();
      $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
      $q = $conn->prepare($sql);
      $q->execute(array(':username' => $username, ':password' => $saltedPassword));

      if (!$q) {
        die("Execute query error, because: ". $conn->errorInfo());
      } else {
        echo 'Registration succesfull.';
        header('Location: /');
      }

    } else {
      die('Username and password must be entered.');
    }
  }

}
