<?php
  include 'init.php';
  if(isset($_SESSION['user_id'])) {
    header('Location: home.php');
  }

  include 'header.php';
  include 'forms/login_form.php';
  include 'forms/signup_form.php';
  include 'footer.php';
?>
