<?php

require '../vendor/autoload.php';

use Router\Router;

if (isset($_COOKIE["test"])) {
  print "Cookies enabled.";
} else {
  if (isset($_REQUEST["testing"])) {
    print "Cookies disabled. Please enable them for full expirience of our website.";
  } else {
    setcookie("test", "1", 0, "/");
    header("Location: $_SERVER[REQUEST_URI]?testing=1");
  }
}

session_start();

define('ROOT_DIR', dirname(__DIR__));
define('TEMPLATE_DIR', ROOT_DIR . '/templates/');

$router = new Router($_SERVER['REQUEST_URI']);

