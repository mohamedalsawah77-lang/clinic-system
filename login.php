<?php
session_start();
include "db/config.php";

if (isset($_POST['login'])) {
  $u = $_POST['username'];
  $p = $_POST['password'];

  $q = mysqli_query($conn,
    "SELECT * FROM admin WHERE username='$u' AND password='$p'"
  );

  if (mysqli_num_rows($q) == 1) {
    $_SESSION['admin'] = $u;
    header("Location: dashboard.php");
  } else {
    $error = "بيانات الدخول غير صحيحة";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
  <h2>تسجيل دخول الموظف</h2>

  <?php if(isset($error)) echo $error; ?>

  <form method="POST">
    <input name="username" placeholder="اسم المستخدم" required>
    <input name="password" type="password" placeholder="كلمة المرور" required>
    <button name="login">دخول</button>
  </form>
</div>

</body>
</html>