<?php
  if(isset($_POST['signup'])) {
    $screen_name = $_POST['screen_name'];
    $email = $_POST['email_signup'];
    $password = $_POST['password_signup'];
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
  <div class="form-group">
    <label for="screen_name">Full Name</label>
    <input type="text" class="form-control" id="screen_name" name="screen_name" placeholder="Full Name">
  </div>
  <div class="form-group">
    <label for="email_signup">Email address</label>
    <input type="email" class="form-control" id="email_signup" name="email_signup" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="password_signup">Password</label>
    <input type="password" class="form-control" id="password_signup" name="password_signup" placeholder="Password">
  </div>
  <button type="submit" name="signup" class="btn btn-primary">Signup for Bark</button>
  <span>
    <?php if(isset($error)) { echo $error; } ?>
  </span>
</form>
