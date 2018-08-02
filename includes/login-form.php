<?php
  if(isset($_POST['login']) && !empty($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) or !empty($password)) {
      $email = $u->check_input($email);
      $password = $u->check_input($password);

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid format";
      }
      else {
        if($u->login($email, $password) == false) {
          $error = "The email or password is incorrect";
        }
      }
    }
    else {
      $error = "Please enter username and password";
    }
  }

?>
<form method="post">
  <h3>Login</h3>
  <ul>
    <li><input type="text" name="email" placeholder="Email"></li>
    <li><input type="password" name="password" placeholder="Password"></li>
    <li><input type="submit" name="login" value="Login"></li>
    <li><input type="checkbox" value="remember" >Remember me</li>
  </ul>
  <span>
    <?php
      if(isset($error)){
        echo $error;
      }
    ?>
  </span>
</form>
