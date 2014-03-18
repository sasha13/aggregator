<?php

namespace Html;


class Html {

  private $viewName;
  private $data;
  private $controllerName;

  public function __construct($controllerName) {
    $this->controllerName = $controllerName;
  }

  public function render($viewName, array $data) {
    //var_dump(TEMPLATE_DIR);
    //var_dump($data);
    $fileToRender = TEMPLATE_DIR . $this->controllerName . '/' . $viewName . '.php';
    echo file_get_contents($fileToRender);
  }
}
