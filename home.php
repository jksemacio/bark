<?php
  include 'init.php';
  if(!isset($_SESSION['user_id'])) {
    header('Location: index.php');
  }

  $user_id = $_SESSION['user_id'];
  $user = $u->user_data($user_id);
  if(!isset($_SESSION['user_id'])) {
    header('Location: index.php');
  }

  include 'header.php';

  echo "Username: " . $user->username . "<br>";
  echo "Email: " . $user->email . "<br>";
  echo "Full Name: " . $user->screen_name . "<br>";
  echo "Following: " . $user->following . "<br>";
  echo "Followers: " . $user->followers . "<br>";

  echo '<a href="logout.php">Log out</a>';

  include 'footer.php';
?>
