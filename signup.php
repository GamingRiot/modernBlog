<?php
include "db.php";
if (isset($_POST['signup'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pswd = $_POST['password'];
  $pswd_hash = password_hash("$pswd", PASSWORD_DEFAULT);
  $query = "INSERT INTO users(username, email ,password) VALUES('$username','$email','$pswd_hash')";
  $insert_user = mysqli_query($conn, $query);
  if ($insert_user) {
    header("Location:signin.php");
    exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include "links.php";
  ?>
  <title>Sign up</title>
</head>

<body>
  <div class="container">
    <h1 style="text-align:center" class="mt-5">
      Sign Up
    </h1>
    <div class="mt-5 d-flex aligns-items-center justify-content-center">
      <form method="POST" action="">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <input type="submit" value="Sign Up" name="signup" class="btn btn-primary">
      </form>
    </div>
  </div>
</body>

</html>
