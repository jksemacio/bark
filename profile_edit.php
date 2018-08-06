<?php
  include 'init.php';
  if(!isset($_SESSION['user_id'])) {
    header('Location: index.php');
  }

  $user_id = $_SESSION['user_id'];
  $user = $u->user_data($user_id);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      <input type="text" name="username" value="<?php echo $user->username ?>">
      <input type="submit" name="update" value="Update">
    </form>
  </body>
</html>
