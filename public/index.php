<?php

require '../vendor/autoload.php';

use Router\Router;

session_start();

define('ROOT_DIR', dirname(__DIR__));
define('TEMPLATE_DIR', ROOT_DIR . '/templates/');

$router = new Router($_SERVER['REQUEST_URI']);

