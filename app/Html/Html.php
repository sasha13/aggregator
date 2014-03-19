<?php

namespace Html;


class Html {

  private $viewName;
  private $controllerName;

  public function __construct($controllerName) {
    $this->controllerName = $controllerName;
  }

  public function render($viewName, array $data) {
    $fileToRender = TEMPLATE_DIR . $this->controllerName . '/' . $viewName . '.php';
    //echo file_get_contents($fileToRender);

    if (!file_exists($fileToRender)) {
      return "Error loading template file ($fileToRender).";
    }

    $output = file_get_contents($fileToRender);
    foreach ($data as $key => $value) {
      $tagToReplace = "{@$key}";
      $output = str_replace($tagToReplace, $value, $output);
    }
    echo $output;
  }

}
