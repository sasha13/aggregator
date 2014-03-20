<?php

namespace Model;

use Db\Db;


class Login {

  public static function checkLoginCredentials($conn, array $data) {
    $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
    $q = $conn->prepare($sql);
    $q->execute(array(':username' => $data['username'], ':password' => md5($data['salt'] . $data['password'])));
    $result = $q->fetchAll(\PDO::FETCH_ASSOC);
//    var_dump($result); die('sss');
    $userId = $result[0]['user_id'];

    if (!$q) {
      die("Execute query error, because: ". $conn->errorInfo());
    } else {
      empty($result) ? $login = false : $login = $userId;
      return $login;
    }
  }

}
