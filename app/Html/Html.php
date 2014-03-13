<?php

namespace Html;


class Html {

  private $layout;
  private $view_name;
  private $data;
  private $controllerName;

  public function __construct() {}

  private function render($layout, $view_name, array $data) {}
  private function render_partial($view_name, array $data) {}
}
