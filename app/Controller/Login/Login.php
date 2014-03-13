<?php

namespace Controller\Login;


class Login {

  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {
    die($this->data['3rd_party']);
  }

  public function view() {
    var_dump($this->data);
  }
}
