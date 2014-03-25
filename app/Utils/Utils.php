<?php

namespace Utils;

use Config\GeneralConfig;


class Utils {

  public static function isRegisterFormPopulatedCorrectly() {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
      return true;
    } else {
      return false;
    }
  }


  public static function prepareDataForUserRegistrationOrLogin() {
    $data = array(
      'username' => $_POST['username'],
      'password' => $_POST['password'],
      'salt' => GeneralConfig::SALT,
    );
    return $data;
  }

  public static function redirect($url) {
    header("Location: {$url}");
  }

  public static function checkIfUsernameExists($conn, $username) {
    $sql = "SELECT user_id FROM user WHERE username = :username";
    $q = $conn->prepare($sql);
    $q->execute(array(':username' => $username));
    $result = $q->fetch(\PDO::FETCH_OBJ);

    if (!$q) {
      die("Execute query error, because: ". $conn->errorInfo());
    } else {
      empty($result) ? $user = false : $user = true;
      return $user;
    }
  }

  public static function isUserLoggedIn() {
    if (empty($_SESSION['member'])) {
      return false;
    } else {
      //session_start();
      return true;
    }
  }

}
