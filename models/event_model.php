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
  $query = "SELECT event.id,
			game.name,
			game_type.name AS type,
			event.location,
			user.username,
			event.description,
			event.date_start,
			event.date_end,
			event.free_place,
              COUNT(DISTINCT ehu.id) AS reserved_place
            FROM event
			INNER JOIN game ON game_id = event.game_id
			INNER JOIN game_type ON game.game_type.id = game_type.id
            INNER JOIN user ON user_id=event.user_id
            LEFT JOIN event_has_user ehu ON ehu.event_id = event.id
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
  $query = "SELECT event.id,
			game.name,
			game_type.name AS type,
			event.location,
			user.username,
			event.description,
			event.date_start,
			event.date_end,
			event.free_place,
              COUNT(DISTINCT ehu.id) AS reserved_place
            FROM event
			INNER JOIN game ON game_id = event.game_id
			INNER JOIN game_type ON game.game_type.id = game_type.id
			INNER JOIN user ON user.id = event.user_id
			LEFT JOIN event_has_user ehu ON ehu.event_id = event.id
            WHERE date LIKE '%$date%'
			ORDER BY event.date_start
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
  $query = "SELECT event.id,
			game.name,
            game_type.name AS type,
            event.location,
            user.username,
            event.description,
            event.date_start,
            event.date_end,
            event.free_place,
              COUNT(DISTINCT ehu.id) AS reserved_place
            FROM event
			INNER JOIN game ON game_id = event.game_id
			INNER JOIN game_type ON game.game_type.id = game_type.id
			INNER JOIN user ON user.id = event.user_id
			LEFT JOIN event_has_user ehu ON ehu.event_id = event.id
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
  $query = "SELECT
              event.id,
              game.name,
              game_type.name AS type,
              event.location,
              user.username,
              event.description,
              event.date_start,
              event.date_end,
              event.free_place,
              COUNT(DISTINCT ehu.id) AS reserved_place
            FROM event 
            INNER JOIN game ON game_id = event.game_id
            INNER JOIN game_type ON game.game_type_id = game_type.id
            INNER JOIN user ON user.id = event.user_id
            LEFT JOIN event_has_user ehu ON ehu.event_id = event.id
            WHERE game.name LIKE '%$name%'
            GROUP BY event.id
   ";

  if ($eredmeny = $dbc->query($query)) {
    while ($sor = $eredmeny->fetch_array()) {
      $event[] = $sor;
    }
  }
  return $event;
}

function kereses_tipus_nev_alapjan($name = '')
  // itt 3 táblát kéne összekötni???
{
  global $dbc;
  $event = [];
  $query = "SELECT event.id,
              game.name,
              game_type.name AS type,
              event.location,
              user.username,
              event.description,
              event.date_start,
              event.date_end,
              event.free_place,
              COUNT(DISTINCT ehu.id) AS reserved_place
            FROM event 
            INNER JOIN game ON event.game_id = game.id  
            INNER JOIN game_type ON game.game_type_id = game_type.id
            LEFT JOIN event_has_user ehu ON ehu.event_id = event.id
            WHERE game_type.name LIKE '%$name%'
			GROUP BY event.id
   ";
  if ($eredmeny = $dbc->query($query)) {
    while ($sor = $eredmeny->fetch_array()) {
      $event[] = $sor;
    }
  }
  return $event;
}

function esemeny_jelentkezes($user_id, $event_id)
{
  global $dbc;
  $query = "
      SELECT
        event.free_place,
        COUNT(DISTINCT ehu.id) AS reserved_place
			FROM event
      LEFT JOIN event_has_user ehu ON ehu.event_id = event.id
      WHERE event.id = $event_id
  ";
  if ($eredmeny = $dbc->query($query)) {
    $sor = $eredmeny->fetch_array();
  }

  if ($eredmeny && (int)$sor['reserved_place'] < (int)$sor['free_place']) {
    $query = "INSERT INTO event_has_user
			(user_id, event_id)
			VALUES ($user_id, $event_id)
  ";
    if ($dbc->query($query)) {
      return $dbc->insert_id;
    }
    return false;
  } else {
    return false;
  }
}
