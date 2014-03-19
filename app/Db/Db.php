<?php

namespace Db;

use Config\DbConfig;

class Db {

  //variable to hold connection object.
  protected static $db;
  //private construct - class cannot be instatiated externally.
  private function __construct() {
    try {
      // assign PDO object to db variable
      self::$db = new \PDO("mysql:host=" . DbConfig::DB_HOST . ";dbname=" . DbConfig::DB_NAME, DbConfig::DB_USER, DbConfig::DB_PASS);
      self::$db->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
    }
    catch (\PDOException $e) {
      //Output error - would normally log this to error file rather than output to user.
      echo "Connection Error: " . $e->getMessage();
    }
  }

  // get connection function. Static method - accessible without instantiation
  public static function getConnection() {
    //Guarantees single instance, if no connection object exists then create one.
    if (!self::$db) {
      //new connection object.
      new Db();
    }
    //return connection.
    return self::$db;
  }

  public static function checkLoginCredentials($conn, array $data) {
    $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
    $q = $conn->prepare($sql);
    $q->execute(array(':username' => $data['username'], ':password' => md5($data['salt'] . $data['password'])));
    $result = $q->fetchAll(\PDO::FETCH_ASSOC);
    //var_dump($result); die('sss');

    if (!$q) {
      die("Execute query error, because: ". $conn->errorInfo());
    } else {
      empty($result) ? $login = false : $login = true;
      return $login;
    }
  }

  public static function registerUser($conn, array $data) {
    $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
    $q = $conn->prepare($sql);
    $q->execute(array(':username' => $data['username'], ':password' => md5($data['salt'] . $data['password'])));

    if (!$q) {
      die("Execute query error, because: ". $conn->errorInfo());
    } else {
      echo 'Registration succesfull.';
      header('Location: /');
    }
  }

}
