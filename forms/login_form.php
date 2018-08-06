<?php
  if(isset($_POST['login']) && !empty($_POST['login'])) {
    $email = $_POST['email_login'];
    $password = $_POST['password_login'];

    if(!empty($email) or !empty($password)) {
      $email = $u->check_input($email);
      $password = $u->check_input($password);

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
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
  <div class="form-group">
    <label for="email_login">Email address</label>
    <input type="email" class="form-control" id="email_login" name="email_login" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="password_login">Password</label>
    <input type="password" class="form-control" id="password_login" name="password_login" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="remember">
    <label class="form-check-label" for="remember">Remember me</label>
  </div>
  <button type="submit" name="login" class="btn btn-primary" value="login">Login</button>
  <span>
    <?php if(isset($error)) { echo $error; } ?>
  </span>
</form>
