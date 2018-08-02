<?php
  include 'init.php';
  if(isset($_SESSION['user_id'])) {
    header('Location: home.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bark!</title>
  </head>
  <body>
    <?php include 'includes/login-form.php' ?>
    <?php include 'includes/signup-form.php' ?>
  </body>
</html>
