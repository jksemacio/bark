<?php
  include 'database/connection.php';
  include 'classes/user.php';
  include 'classes/follow.php';
  include 'classes/bark.php';

  global $pdo;

  session_start();

  $u = new User($pdo);
  $f = new Follow($pdo);
  $b = new Bark($pdo);

  define("BASE_URL", "http://localhost/bark/");
?>
