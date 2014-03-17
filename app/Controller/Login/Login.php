<?php

namespace Controller\Login;


class Login {

  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {
    print '
      <html>
        <head></head>
        <title>Aggregator</title>
        <body>
          <div>
            <h2>Aggregator</h2>
          </div>
          <div>
            <ul>
              <li><a href="login">Login</a></li>
              <li><a href="register">Register</a></li>
            </ul>
          </div>
          <div>
            <ul>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Rss</a></li>
              <li><a href="#">Bookmarks</a></li>
            </ul>
          </div>
          <div>
            <h3>Login</h3>
            <form action="login/process" method="post">
              Username: <input type="text" name="Username" /><p>
              Password: <input type="password" name="Password" />
              <br>
              <input type="submit" value="Submit" />
            </form>
          </div>
        </body>
      </html>
    ';
  }

  public function view() {
    var_dump($this->data);
  }

  public function process() {
    var_dump($_POST);
  }
}
