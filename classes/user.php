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

  public function user_data($user_id) {
    $sql = "SELECT * FROM `users` WHERE `user_id` = :user_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_OBJ);
    return $user;
  }

  public function logout() {
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
  }

  public function check_email($email) {
    $sql = "SELECT `email` FROM `users` WHERE `email` = :email";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->rowCount();
    if($count > 0) {
      return true;
    }
    else {
      return false;
    }
  }

  public function register($screen_name, $email, $password) {
    $sql = "INSERT INTO `users` (`screen_name`, `email`, `password`) VALUES (:screen_name, :email, :password)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(":screen_name", $screen_name, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":password", md5($password), PDO::PARAM_STR);
    $stmt->execute();

    $user_id = $this->pdo->lastInsertId();
    $_SESSION['user_id'] = $user_id;
  }

  public function create($table, $fields = array()) {
    $columns = implode(', ', array_keys($fields));
    $values = ":" . implode(', :', array_keys($fields));
    $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
    $stmt = $this->pdo->prepare($sql);
    foreach($fields as $key => $data) {
      $stmt->bindValue(':' . $key, $data);
    }
    $stmt->execute();
    return $this->pdo->lastInsertId();
  }

  
}
?>
