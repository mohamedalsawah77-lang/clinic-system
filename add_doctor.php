<?php
session_start();
include "db/config.php";
if (!isset($_SESSION['admin'])) header("Location: login.php");

if (isset($_POST['add'])) {
  mysqli_query($conn, "
    INSERT INTO doctors (full_name, specialty, address, phone)
    VALUES (
      '$_POST[name]',
      '$_POST[specialty]',
      '$_POST[address]',
      '$_POST[phone]'
    )
  ");
  header("Location: doctors.php");
}
?>

<link rel="stylesheet" href="css/style.css">

<div class="container">
<h2>إضافة طبيب</h2>

<form method="POST">
  <input name="name" placeholder="الاسم الكامل">
  <input name="specialty" placeholder="الاختصاص">
  <input name="address" placeholder="العنوان">
  <input name="phone" placeholder="رقم الهاتف">
  <button name="add">حفظ</button>
</form>
</div>