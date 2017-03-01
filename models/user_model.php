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

function kereses_id_alapjan($id)
{
  global $dbc;
  $user = [];
  $query = "SELECT *
            FROM user
            WHERE id = $id    
    ";
  if ($eredmeny = $dbc->query($query)) {
    $user = $eredmeny->fetch_array();
  }
  return $user;
}
