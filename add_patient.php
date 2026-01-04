<?php
session_start();
include "db/config.php";
if (!isset($_SESSION['admin'])) header("Location: login.php");

if (isset($_POST['add'])) {
  mysqli_query($conn, "
    INSERT INTO patients (full_name, doctor, department, disease, check_in)
    VALUES (
      '$_POST[name]',
      '$_POST[doctor]',
      '$_POST[department]',
      '$_POST[disease]',
      '$_POST[checkin]'
    )
  ");
  header("Location: dashboard.php");
}
?>

<link rel="stylesheet" href="css/style.css">

<div class="container">
<h2>إضافة مريض</h2>

<form method="POST">
  <input name="name" placeholder="الاسم الكامل" required>

  <select name="doctor">
    <?php
    $docs = mysqli_query($conn, "SELECT full_name FROM doctors");
    while ($d = mysqli_fetch_assoc($docs)) {
      echo "<option>{$d['full_name']}</option>";
    }
    ?>
  </select>

  <select name="department">
    <option>الداخلية</option>
    <option>الصدرية</option>
    <option>الهضمية</option>
  </select>

  <input name="disease" placeholder="المرض / الشكوى">
  <input type="date" name="checkin" required>

  <button name="add">حفظ</button>
</form>
</div>