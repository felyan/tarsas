<?php
include "db.php";

function kereses_fnev_alapjan($fnev)
{
  global $dbc;
  $user = [];
  $query = "SELECT *
            FROM user
            WHERE username LIKE '%$fnev%'    
    ";
  if ($eredmeny = $dbc->query($query)) {
    while ($sor = $eredmeny->fetch_array()) {
      $user[] = $sor;
    }
  }
  return $user;
}
