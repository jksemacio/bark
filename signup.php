<?php
  include 'init.php';
  $user_id = $_SESSION['user_id'];

  if(isset($_GET['step']) and !empty($_GET['step'])) {
    if(isset($_POST['next'])) {
      $username = $_POST['username'];
      $username = $u->check_input($username);

      if(!empty($username)) {
        if(strlen($username) < 6 or strlen($username) > 20) {
          $error = "Username must be between 6-20 characters";
        }
        else if ($u->check_username($username) == true) {
          $error = "Username is already taken";
        }
        else {
          $u->update('users', $user_id, array('username' => $username));
          header('Location: signup.php?step=2');
        }
      }
      else {
        $error = "Please enter username";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bark!</title>
  </head>
  <body>
    <?php if(isset($_GET['step']) and $_GET['step'] == 1) { ?>
    <form method="post">
      <ul>
        <li><input type="text" name="username" placeholder="Username"></li>
        <li></li><input type="submit" name="next" value="Next">
      </ul>
      <span>
        <?php
          if(isset($error)) {
            echo $error;
          }
        ?>
      </span>
    </form>
    <?php } ?>
    <?php
      if(isset($_GET['step']) and $_GET['step'] == 2) {
        echo "Welcome!";
      }
    ?>
  </body>
</html>
