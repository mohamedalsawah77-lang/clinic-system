<?php
session_start();
include "db/config.php";
if (!isset($_SESSION['admin'])) header("Location: login.php");
?>

<link rel="stylesheet" href="css/style.css">

<div class="container">
<h2>قائمة الأطباء</h2>

<a href="dashboard.php">رجوع</a>

<table>
<tr>
  <th>الاسم</th>
  <th>الاختصاص</th>
  <th>العنوان</th>
  <th>الهاتف</th>
</tr>

<?php
$q = mysqli_query($conn, "SELECT * FROM doctors");
while ($d = mysqli_fetch_assoc($q)) {
  echo "<tr>
    <td>{$d['full_name']}</td>
    <td>{$d['specialty']}</td>
    <td>{$d['address']}</td>
    <td>{$d['phone']}</td>
  </tr>";
}
?>
</table>
</div>