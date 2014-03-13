<?php

require '../vendor/autoload.php';

use Router\Router;

$router = new Router($_SERVER['REQUEST_URI']);

