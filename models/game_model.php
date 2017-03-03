<?php
include 'db.php';

function jatek_kereses_nev_alapjan($name = '')
{
  global $dbc;
  $game = [];
  $query = "SELECT *
            FROM game    
   ";
  if (strlen($name)) {
    $query .= " WHERE name LIKE '%$name%'";
  }
  if ($eredmeny = $dbc->query($query)) {
    while ($sor = $eredmeny->fetch_array()) {
      $game[] = $sor;
    }
  }
  return $game;
}

function jatek_tipus_nev_alapjan($name = '')
{
  global $dbc;
  $type = [];
  $query = "SELECT *
            FROM game_type    
   ";
  if (strlen($name)) {
    $query .= " WHERE name LIKE '%$name%'";
  }
  if ($eredmeny = $dbc->query($query)) {
    while ($sor = $eredmeny->fetch_array()) {
      $type[] = $sor;
    }
  }
  return $type;
}
