<?php
  if(isset($_POST['signup'])) {
    $screen_name = $_POST['screen_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = '';

    if(!empty($screen_name) or !empty($email) or !empty($password)) {
      $screen_name = $u->check_input($screen_name);
      $email = $u->check_input($email);
      $password = $u->check_input($password);

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
      }
      else if(strlen($screen_name) < 6 or strlen($screen_name) > 40) {
        $error = "Name must be between 6-40 characters";
      }
      else if (strlen($password) < 6) {
        $error = "Password must be above 6 characters";
      }
      else {
        if($u->check_email($email) == true) {
          $error = "Email is already in use";
        }
        else {
          $u->register($screen_name, $email, $password);
          header('Location: signup.php?step=1');
        }
      }
    }
    else {
      $error = "All fields are required";
    }
  }

?>
<form method="post">
  <h3>Signup</h3>
  <ul>
    <li><input type="text" name="screen_name" placeholder="Full Name"></li>
    <li><input type="text" name="email" placeholder="Email"></li>
    <li><input type="password" name="password" placeholder="Password"></li>
    <li><input type="submit" name="signup" value="Signup for Bark"></li>
  </ul>
  <span>
    <?php
      if(isset($error)) {
        echo $error;
      }
    ?>
  </span>
</form>
