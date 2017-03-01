<?php
include 'db.php';

function kereses_name_alapjan($name = '')
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
