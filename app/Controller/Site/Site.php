<?php

namespace Controller\Site;

use Controller\Main\Main;

class Site extends Main {

  public function __construct($data) {
    $this->data = $data;
  }

  public function index() {
    //Html::layout = 'main';
    $a = $this->getControllerName($this);
    var_dump(dirname(__DIR__));
    var_dump($a);
//     $model = loadModel('model_name');
//     Html::render('view_name', array());
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
              <li><a href="#">Register</a></li>
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
            <h3>Aggregator</h3>
          </div>
          <div>
            <h3>Aggregator</h3>
          </div>
          <div>
            <h3>Aggregator</h3>
          </div>
        </body>
      </html>
    ';
  }

}
