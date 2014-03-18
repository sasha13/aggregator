<?php

namespace Controller\Main;


class Main {

  public $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {

  }

  public function getControllerName() {
    $fullName = get_class($this);
    $fullNameArray = explode('\\', $fullName);
    return $name = end($fullNameArray);
  }

  public function getControllerNameLowercase() {
    $fullName = get_class($this);
    $fullNameArray = explode('\\', $fullName);
    return $name = strtolower(end($fullNameArray));
  }
}
