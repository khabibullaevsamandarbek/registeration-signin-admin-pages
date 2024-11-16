<?php
session_start();
include '../config/config.php';
include '../backup/functions.php';

if(isset($_POST["log-in-btn"])){
  $email = sanitize_input($_POST["email"]);
  $password = sanitize_input($_POST["password"]);

  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute([$email]);
  $user = $stmt->fetch();

  if($user && varify_password($password , $user["password"])){
    $_SESSION["id"] = $user["id"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["role"] = $user["role"];
    header("Location: admin.php");
  }else{
    echo "
      <div class='alert alert-danger m-3' role='alert'>
         Cridentials are not correct!!
      </div>
    ";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    
  <div class="container d-flex justify-content-center">
    <form action="#" class="card bg-info mt-4 border-0" method="POST" style="width:23rem;">
      <div class="card-top">
        <h1 class="text-center p-4">Log In</h1>
      </div>
      <div class="card-body d-flex flex-column gap-2">
        <div class="input-group">
          <span class="input-group-text" style="width: 100px;">Email</span>
          <input type="email" class="form-control" name="email" placeholder="Enter email...">
        </div>
        <div class="input-group">
          <span class="input-group-text" style="width: 100px;">Password</span>
          <input type="password" class="form-control" name="password" placeholder="Enter password...">
        </div>
        <div class="d-flex align-item-center justify-content-center flex-column gap-2">
          <button class="btn btn-warning text-center" type="submit" name="log-in-btn">Log In</button>
          <a href="register.php" class="text-black">Don't have an account?</a>
        </div>
      </div>
    </form>
  </div>

  </body>
</html>
 