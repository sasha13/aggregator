<?php

require '../vendor/autoload.php';

use Router\Router;
use Db\Db;

$conn = Db::getConnection();
//$sql = "SELECT * FROM user";
//$q = $conn->query($sql);
//var_dump($q->fetch(PDO::FETCH_OBJ));

$router = new Router($_SERVER['REQUEST_URI']);

