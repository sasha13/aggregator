<?php

namespace Model;

use Db\Db;


class User {

  public static function getUser($id) {
    $conn = Db::getConnection();
    $sql = "SELECT user_id, username FROM user WHERE user_id = :user_id";
    $q = $conn->prepare($sql);
    $q->execute(array(':user_id' => $id));
    $result = $q->fetch(\PDO::FETCH_OBJ);

    if (!$q) {
      die("Execute query error, because: ". $conn->errorInfo());
    } else {
      return $result;
    }
  }
  public function getUserName($id) {
    $conn = Db::getConnection();
    $sql = "SELECT username FROM user WHERE user_id = :user_id";
    $q = $conn->prepare($sql);
    $q->execute(array(':user_id' => $id));
    $result = $q->fetch(\PDO::FETCH_OBJ);
    $username = $result->username;

    if (!$q) {
      die("Execute query error, because: ". $conn->errorInfo());
    } else {
      return $username;
    }
  }

  public function getUserId($username) {
    $conn = Db::getConnection();
    $sql = "SELECT user_id FROM user WHERE username = :username";
    $q = $conn->prepare($sql);
    $q->execute(array(':username' => $username));
    $result = $q->fetch(\PDO::FETCH_OBJ);
    $userId = $result->user_id;

    if (!$q) {
      die("Execute query error, because: ". $conn->errorInfo());
    } else {
      return $userId;
    }
  }

}
