<?php
include 'db.php';

function esemeny_insert($user_id, $game_id, $start, $end, $location, $description, $free_place)
{
  global $dbc;
  $query = "INSERT INTO event
    (user_id, game_id, date_start, date_end, location, description, free_place)
    VALUES ($user_id, $game_id, '$start', '$end', '$location', '$description', $free_place)
  ";
  if ($dbc->query($query)) {
    return $dbc->insert_id;
  }
  return false;

}

function kereses_usernev_alapjan($fnev)
{
  global $dbc;
  $event = [];
  $query = "SELECT *
            FROM event
            INNER JOIN user ON user_id=event.user_id
            WHERE username LIKE '%$fnev%'
    ";
  if ($eredmeny = $dbc->query($query)) {
    $event = $eredmeny->fetch_array();
  }
  return $event;
}

function kereses_datum_alapjan($date)
{
  global $dbc;
  $event = [];
  $query = "SELECT *
            FROM event
            WHERE date LIKE '%$date%'
    ";
  if ($eredmeny = $dbc->query($query)) {
    $event = $eredmeny->fetch_array();
  }
  return $event;
}

function kereses_helyszin_alapjan($cim)
{
  global $dbc;
  $event = [];
  $query = "SELECT *
            FROM event
            WHERE cim LIKE '%$cim%'
    ";
  if ($eredmeny = $dbc->query($query)) {
    $event = $eredmeny->fetch_array();
  }
  return $event;
}

function kereses_jateknev_alapjan($name = '')
{
  global $dbc;
  $event = [];
  $query = "SELECT *
            FROM event 
            INNER JOIN game ON game_id=event.game_id
            WHERE name LIKE '%$name%'
   ";

  if ($eredmeny = $dbc->query($query)) {
    while ($sor = $eredmeny->fetch_array()) {
      $game[] = $sor;
    }
  }
  return $event;
}

function kereses_tipus_nev_alapjan($name = '')
  // itt 3 táblát kéne összekötni???
{
  global $dbc;
  $event = [];
  $query = "SELECT *
            FROM event 
            INNER JOIN game ON game_id=event.game_id  
            AND INNER JOIN game_type ON game_type_id=game.game_type_id 
            WHERE name LIKE '%$name%'    
   ";
  if ($eredmeny = $dbc->query($query)) {
    while ($sor = $eredmeny->fetch_array()) {
      $type[] = $sor;
    }
  }
  return $event;
}

