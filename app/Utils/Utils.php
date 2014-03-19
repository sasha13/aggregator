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


  public static function prepareDataForUserRegistration() {
    $data = array(
      'username' => $_POST['username'],
      'password' => $_POST['password'],
      'salt' => GeneralConfig::SALT,
    );
    return $data;
  }


}
