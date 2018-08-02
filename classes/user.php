<?php
class User {
  protected $pdo;

  function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function check_input($input) {
    $input = htmlspecialchars($input);
    $input = trim($input);
    $input = stripcslashes($input);
    return $input;
  }

  public function login($email, $password) {
    $password = md5($password);
    $sql = "SELECT `user_id` FROM `users` WHERE `email` = :email AND `password` = :password";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_OBJ);
    $count = $stmt->rowCount();

    if($count > 0) {
      $_SESSION['user_id'] = $user->user_id;
      header('Location: home.php');
    }
    else {
      return false;
    }
  }
}
?>
