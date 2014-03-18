<html>
  <head></head>
  <title>Aggregator</title>
  <body>
    <div>
      <h2>{@title}</h2>
    </div>
    <div>
      <ul>
        <li><a href="/">Home</a></li>
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
      <h3>Register</h3>
      <form action="register/process" method="post">
        Username: <input type="text" name="username" /><p>
        Password: <input type="password" name="password" />
        <br>
        <input type="submit" value="Submit" />
      </form>
    </div>
  </body>
</html>
