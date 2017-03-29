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

function esemeny_kereses($tipus, $kifejezes)
{
  global $dbc;
  $events = [];
  $query = "
    SELECT
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
    INNER JOIN game ON game.id = event.game_id
    INNER JOIN game_type ON game.game_type_id = game_type.id
    INNER JOIN user ON user.id = event.user_id
    LEFT JOIN event_has_user ehu ON ehu.event_id = event.id
    ";
  switch ($tipus) {
    case 'name':
      $query .= " WHERE game.name LIKE '%$kifejezes%' ";
      break;
    case 'type':
      $query .= " WHERE game_type.name LIKE '%$kifejezes%' ";
      break;
    case 'location':
      $query .= " WHERE event.location LIKE '%$kifejezes%' ";
      break;
    case 'username':
      $query .= " WHERE user.username LIKE '%$kifejezes%' ";
      break;
    case 'date':
      $query .= " WHERE event.date_start > '$kifejezes' ";
      break;
    case 'user_id':
      $query .= " WHERE user.id = '$kifejezes' ";
      break;
  }
  $query .= "
    GROUP BY event.id
  ";
  if ($eredmeny = $dbc->query($query)) {
    while ($event = $eredmeny->fetch_array()) {
      $event['jelentkezhet'] = (int)$event['reserved_place'] < (int)$event['free_place'];
      $events[] = $event;
    }
  }
  return $events;
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
