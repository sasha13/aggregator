<?php

namespace Db;

use Config\DbConfig;


class Db {

  //variable to hold connection object.
  protected static $db;

  private function __construct() {
    try {
      self::$db = new \PDO("mysql:host=" . DbConfig::DB_HOST . ";dbname=" . DbConfig::DB_NAME, DbConfig::DB_USER, DbConfig::DB_PASS);
      self::$db->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
    }
    catch (\PDOException $e) {
      echo "Connection Error: " . $e->getMessage();
    }
  }

  public static function getConnection() {
    //Guarantees single instance, if no connection object exists then create one.
    if (!self::$db) {
      new Db();
    }
    return self::$db;
  }

}
