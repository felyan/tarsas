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
  <?php include('views/' . $viewName . ".php"); ?>
</main>
<?php include "views/footer.php"; ?>
</body>
</html>
