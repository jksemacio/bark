<?php
  include 'init.php';
  $user_id = $_SESSION['user_id'];
  $user = $u->user_data($user_id);

  echo "Username: " . $user->username . "<br>";
  echo "Email: " . $user->email . "<br>";
  echo "Full Name: " . $user->screen_name . "<br>";
  echo "Following: " . $user->following . "<br>";
  echo "Followers: " . $user->followers . "<br>";
?>
<a href="logout.php">Log out</a>
