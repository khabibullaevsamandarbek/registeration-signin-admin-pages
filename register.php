<?php
include '../config/config.php';
include '../backup/functions.php';

if(isset($_POST["sign-in-btn"])){
  $username = sanitize_input($_POST["username"]);
  $email = sanitize_input($_POST["email"]);
  $password = sanitize_input($_POST["password"]);
  $hashed_password = hash_password($password);

  $stmt = $pdo->prepare("INSERT INTO users (username , email , password) VALUES (? , ? , ?)");
  $stmt->execute([$username , $email , $hashed_password]);

  echo "
      <div class='alert alert-success m-3' role='alert'>
         Registered Successfully!!
      </div>
  ";

  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container d-flex justify-content-center">
    <form action="#" class="card bg-info mt-4 border-0" method="POST" style="width:23rem;">
      <div class="card-top">
        <h1 class="text-center p-4">Sign In</h1>
      </div>
      <div class="card-body d-flex flex-column gap-2">
        <div class="input-group">
          <span class="input-group-text" style="width: 100px;">Username</span>
          <input type="text" class="form-control" name="username" placeholder="Enter username...">
        </div>
        <div class="input-group">
          <span class="input-group-text" style="width: 100px;">Email</span>
          <input type="email" class="form-control" name="email" placeholder="Enter email...">
        </div>
        <div class="input-group">
          <span class="input-group-text" style="width: 100px;">Password</span>
          <input type="password" class="form-control" name="password" placeholder="Enter password...">
        </div>
        <div class="d-flex align-item-center justify-content-center flex-column gap-2">
          <button class="btn btn-warning text-center" type="submit" name="sign-in-btn">Sign In</button>
          <a href="login.php" class="text-black">Already have an account?</a>
        </div>
      </div>
    </form>
  </div>


</body>

</html>