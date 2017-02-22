<?php
include 'db.php';

$gameTypes = [];
$query = " SELECT * FROM game_type";

if ($eredmeny = mysqli_query($dbc, $query)) {
  $talalatok_szama = mysqli_num_rows($eredmeny);

  if ($talalatok_szama) {
    while ($sor = mysqli_fetch_array($eredmeny)) {
      $gameTypes [] = $sor;
    }
  } else {
    echo "Nincs a keresési feltételeknek megfelelő találat!";
  }
  mysqli_free_result($eredmeny);
}
