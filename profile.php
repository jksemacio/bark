<?php
  if(isset($_GET['username']) and !empty($_GET['username'])) {
    include 'init.php';
    $username = $u->check_input($_GET['username']);
    $profile_id = $u->userIdByUsername($username);
    $profile_data = $u->user_data($profile_id);
    $user_id = $_SESSION['user_id'];
    $user_data = $u->user_data($user_id);

    echo $profile_id . "<br>";
    echo $user_id . "<br>";
  }
?>
