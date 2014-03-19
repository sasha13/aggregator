<?php

require '../vendor/autoload.php';

use Router\Router;
use Db\Db;

define('ROOT_DIR', dirname(__DIR__));
define('TEMPLATE_DIR', ROOT_DIR . '/templates/');

$router = new Router($_SERVER['REQUEST_URI']);

