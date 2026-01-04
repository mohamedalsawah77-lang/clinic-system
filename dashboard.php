<?php
session_start();
include "db/config.php";
if (!isset($_SESSION['admin'])) header("Location: login.php");

if (isset($_GET['out'])) {
  mysqli_query($conn,
    "UPDATE patients SET check_out=CURDATE() WHERE id=".$_GET['out']
  );
}

$where = "WHERE 1";

if (!empty($_GET['search'])) {
  $s = $_GET['search'];
  $where .= " AND full_name LIKE '%$s%'";
}

if (!empty($_GET['department'])) {
  $d = $_GET['department'];
  $where .= " AND department='$d'";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
<h2>لوحة التحكم</h2>

<a href="add_patient.php">+ إضافة مريض</a>
<a href="add_doctor.php">+ إضافة طبيب</a>
<a href="doctors.php">عرض الأطباء</a>
<a href="logout.php">تسجيل خروج</a>

<form method="GET">
  <input name="search" placeholder="بحث باسم المريض">
  <select name="department">
    <option value="">كل الأقسام</option>
    <option>الداخلية</option>
    <option>الصدرية</option>
    <option>الهضمية</option>
  </select>
  <button>بحث</button>
</form>

<table>
<tr>
  <th>الاسم</th>
  <th>الطبيب</th>
  <th>القسم</th>
  <th>المرض</th>
  <th>الدخول</th>
  <th>الخروج</th>
  <th>إجراء</th>
</tr>

<?php
$res = mysqli_query($conn, "SELECT * FROM patients $where");
while ($row = mysqli_fetch_assoc($res)) {
  echo "<tr>
    <td>{$row['full_name']}</td>
    <td>{$row['doctor']}</td>
    <td>{$row['department']}</td>
    <td>{$row['disease']}</td>
    <td>{$row['check_in']}</td>
    <td>{$row['check_out']}</td>
    <td><a href='?out={$row['id']}'>تسجيل خروج</a></td>
  </tr>";
}
?>
</table>

</div>
</body>
</html>