<?php

namespace Controller\User;


class User {

  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {
    die('User/index');
  }

  public function view() {
    var_dump($this->data);
  }
}
