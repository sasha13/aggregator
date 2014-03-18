<?php

require '../vendor/autoload.php';

use Router\Router;
use Db\Db;

define('ROOT_DIR', dirname(__DIR__));
define('TEMPLATE_DIR', ROOT_DIR . '/templates/');

//var_dump(TEMPLATE_DIR);
//var_dump(ROOT_DIR);
//die();

//$conn = Db::getConnection();
//$sql = "SELECT * FROM user";
//$q = $conn->query($sql);
//var_dump($q->fetch(PDO::FETCH_OBJ));

$router = new Router($_SERVER['REQUEST_URI']);

