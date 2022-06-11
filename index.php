<?php
session_start();
include "db.php";
if (isset($_REQUEST['logout'])) {
  session_destroy();
  header("Location: signin.php");
  exit();
}
?>
<!doctype html>
<html lang="en">

<head>
  <?php
  include "links.php";
  ?>
  <title>Hello, world!</title>
</head>

<body>
  <h1>Hello, <?php echo $_SESSION['email']; ?></h1>
  <form method="POST">
    <input type="submit" name="logout" value="Logout" class="btn btn-danger">
  </form>
</body>

</html>
