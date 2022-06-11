<?php
session_start();
include "db.php";
if (isset($_REQUEST['signin'])) {
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  $query = "SELECT * FROM users WHERE email='$email'";
  $select_query = mysqli_query($conn, $query);
  foreach ($select_query as $value) {
    $pswd_match = password_verify($password, $value['password']);
    if ($pswd_match) {
      $_SESSION['email'] = $email;
      header("Location:index.php");
      exit();
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include "links.php";
  ?>
  <title>Sign in</title>
</head>

<body>
  <div class="container">
    <h1 style="text-align:center" class="mt-5">
      Sign In
    </h1>
    <div class="mt-5 d-flex aligns-items-center justify-content-center">
      <form method="POST" action="">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <input type="submit" value="Sign In" name="signin" class="btn btn-primary">
      </form>
    </div>
  </div>
</body>

</html>
