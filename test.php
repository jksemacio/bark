<?php
  $pdo1 = new PDO('mysql: host=localhost; dbname=testing', 'jksemacio', 'kalokohan');

  $pdo2 = new PDO('mysql:host=localhost', 'root', '');
  $stmt = $pdo2->prepare("CREATE DATABASE IF NOT EXISTS testing");
  $stmt->execute();

  $stmt = $pdo2->prepare("SHOW DATABASES LIKE 'testing'");
  $stmt->execute();
  $db = $stmt->fetch(PDO::FETCH_OBJ);
  $count = $stmt->rowCount();
  if($count > 0) {
    echo "Database exist" . "<br>";
  } else {
    echo "Database doesn't exist" . "<br>";
  }

  $stmt = $pdo1->prepare("CREATE TABLE IF NOT EXISTS users (user_id int, username varchar(20))");
  $stmt->execute();

  $stmt = $pdo1->prepare("SHOW TABLES LIKE 'users'");
  $stmt->execute();
?>
