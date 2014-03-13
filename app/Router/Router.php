<?php

namespace Router;

class Router {

  private $url;


  public function __construct($url) {
  	$this->url = $url;
    $url_array = $this->parseUrl($url);
    $data = $this->determineController($url_array);
    $obj = $this->instantiateController($data);
  }


  public function getUrl() {
  	return $this->url;
  }


  public function parseUrl($url) {
  	$route = explode('/', $url);
  	$dump_empty = array_shift($route);
  	$filtered = array_filter($route);
  	return $filtered;
  }


  public function determineController(array $args) {
    $controller = 'Site';
    $action = 'index';
    $parameters = array();

    if (isset($args[0])) {
      $controller = ucfirst($args[0]);
      if (!isset($args[1])) {
        $action = 'index';
        $parameters = array();
      } else {
        $action = $args[1];
        $values = array_slice($args, 2);
        //var_dump($values); die();
        if (isset($args[3])) {
          $keys = array('id', '3rd_party');
        } else {
          $keys = array('id');
        }
        if (isset($args[2])) {
          $parameters = array_combine($keys, $values);
        } else {
          $parameters = array();
        }
      }
    }

    return array(
      'controller' => $controller,
      'action' => $action,
      'parameters' => $parameters
    );
  }


  public function instantiateController(array $data) {
    $namespacePart = '\\Controller\\' . $data['controller'] . '\\';
    $controllerPart = $data['controller'];
    $action = $data['action'];
    $controllerClass = $namespacePart . $controllerPart;
    $parameters = $data['parameters'];
    if (class_exists($controllerClass)) {
      $obj = new $controllerClass($parameters);
      if (method_exists($controllerClass, $action)) {
        $obj->$action();
      } else {
        die('404; Action doesn\'n exist.');
      }
    } else {
      die('404; Controller doesn\'n exist.');
    }
  }
}
