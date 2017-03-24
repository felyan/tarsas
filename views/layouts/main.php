<!doctype html>
<html>
<head>
  <title>Társasjáték szervező</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/styles/index.css"/>
</head>
<body>
<?php
// TODO: A "partial" típusú beolvasásokat is a "view" eljráás intézze!
include "views/header.php"; ?>
<?php if ($view['message']): ?>
  <div class="urlap">
    <?= $view['message'] ?>
  </div>
<?php endif; ?>
<br>
<main>
  <?php include('views/' . $viewName . ".php"); ?>
</main>
<?php include "views/footer.php"; ?>
</body>
</html>
