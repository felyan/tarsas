<?php
session_start();
if (isset($_GET['tartalom'])) {
  $tartalom = $_GET['tartalom'];
} else {
  $tartalom = 'fooldal';
}
$user = null;
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
}
?>
<!doctype html>
<html>
<head>
  <title>Társasjáték szervező</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/styles/index.css"/>
</head>
<body>
<?php
if (!empty($_SESSION['message'])) {
  echo $_SESSION['message'];
  $_SESSION['message'] = '';
}
?>
<?php include "views/header.php"; ?>
<main>
  <?php include('views/' . $tartalom . ".php"); ?>
</main>
<?php include "views/footer.php"; ?>
</body>
</html>
