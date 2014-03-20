<?php

namespace Model;

use Db\Db;
use Utils\Utils;


class Register {

  public static function registerUser($conn, array $data) {
    $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
    $q = $conn->prepare($sql);
    $q->execute(array(':username' => $data['username'], ':password' => md5($data['salt'] . $data['password'])));

    if (!$q) {
      die("Execute query error, because: ". $conn->errorInfo());
    } else {
      echo 'Registration succesfull.';
      Utils::redirect("/");
    }
  }

}
