<?php
include 'db.php';

$games = [];
$query = " SELECT * FROM game";

if ($eredmeny = mysqli_query($dbc, $query)) {
  $talalatok_szama = mysqli_num_rows($eredmeny);

  if ($talalatok_szama) {
    while ($sor = mysqli_fetch_array($eredmeny)) {
      $games [] = $sor;
    }
  } else {
    echo "Nincs a keresési feltételeknek megfelelő találat!";
  }
  mysqli_free_result($eredmeny);
}
