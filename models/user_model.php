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

function kereses_cim_alapjan($cim)
{
  global $dbc;
  $user = [];
  $query = "SELECT *
            FROM user
            WHERE cim = $cim    
    ";
  if ($eredmeny = $dbc->query($query)) {
    $user = $eredmeny->fetch_array();
  }
  return $user;
}

function felhasznalo_letrehozas($fullname, $email, $username, $password)
{
  global $dbc;
  $query = "
  INSERT INTO user
  (fullname, email, username, password)
  VALUES ('$fullname', '$email', '$username', SHA1('$password'))
  ";
  if ($dbc->query($query)) {
    return $dbc->insert_id;
  }
  return false;
}

function felhasznalo_modositas($fullname, $email, $username, $password, $user_id)
{
  global $dbc;
  $query = "
  INSERT INTO user
  (fullname, email, username, password)
  VALUES ('$fullname', '$email', '$username', SHA1('$password'))
  ";
  if ($dbc->query($query)) {
    return $dbc->insert_id;
  }
  return false;
}

function felhasznalo_jatekai_select($user_id)
{
  global $dbc;
  $output = [];
  $query = "
    SELECT
      game.*,
      uhg.sajat,
      uhg.szivesen
    FROM game
    LEFT JOIN user_has_game uhg ON uhg.game_id = game.id
    WHERE uhg.user_id = $user_id
    ";
  if ($eredmeny = $dbc->query($query)) {
    while ($row = $eredmeny->fetch_array()) {
      $output [] = $row;
    }
  }
  return $output;
}

function felhasznalo_jatekai_insert($jatekok, $user_id, $sajat = false, $szivesen = false)
{
  global $dbc;
  $insert_id = [];
  $sajat = (int)$sajat;
  $szivesen = (int)$szivesen;
  foreach ($jatekok as $game_id) {
    $query = "
    INSERT INTO user_has_game
    (user_id, game_id, sajat, szivesen)
    VALUES ($user_id, $game_id, $sajat, $szivesen)
    ";
    if ($dbc->query($query)) {
      $insert_id [] = $dbc->insert_id;
    }
  }
  if (count($insert_id)) {
    return $insert_id;
  }
  return false;
}

function felhasznalo_jatek_tipusok_select($user_id)
{
  global $dbc;
  $output = [];
  $query = "SELECT *
            FROM user_has_game_types
            WHERE user_id = $user_id
    ";
  if ($eredmeny = $dbc->query($query)) {
    while ($sor = $eredmeny->fetch_array()) {
      $output[] = $sor['game_type_id'];
    }
  }
  return $output;
}

function felhasznalo_jatek_tipusok_insert($jatek_tipusok, $user_id)
{
  global $dbc;
  $insert_id = [];
  foreach ($jatek_tipusok as $type_id) {
    $query = "
    INSERT INTO user_has_game_types
    (user_id, game_type_id)
    VALUES ($user_id, $type_id)
    ";
    if ($dbc->query($query)) {
      $insert_id [] = $dbc->insert_id;
    }
  }
  if (count($insert_id)) {
    return $insert_id;
  }
  return false;
}


function jatekok_user_id_alapjan($user_id)
{
  global $dbc;
  $kimenet = [];
  $query = "SELECT *
            FROM user_has_game
            INNER JOIN game ON game.id = user_has_game.game_id
            WHERE user_id = $user_id
   ";
  if ($eredmeny = $dbc->query($query)) {
    while ($sor = $eredmeny->fetch_array()) {
      $kimenet[] = $sor;
    }
  }
  return $kimenet;
}
