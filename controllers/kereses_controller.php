<?php
include "models/game_model.php";
include "models/user_model.php";
include "models/event_model.php";

function kereses($tipus = '', $kifejezes = '', $events = [])
{
  global $user;
  view('kereses', [
    'tipus' => $tipus,
    'kifejezes' => $kifejezes,
    'events' => $events
  ]);
}

function kereses_action()
{
  $kifejezes = $_POST['kifejezes'];
  $tipus = $_POST['tipus'];

  switch ($tipus) {
    case 'name':
      $events = kereses_jateknev_alapjan($kifejezes);
      break;
    case 'type':
      $events = kereses_tipus_nev_alapjan($kifejezes);
      break;
    case 'location':
      $events = kereses_helyszin_alapjan($kifejezes);
      break;
    case 'username':
      $events = kereses_usernev_alapjan($kifejezes);
      break;
    case 'date':
      $events = kereses_datum_alapjan($kifejezes);
      break;
  }

  foreach ($events as $key => $event) {
    $events[$key]['jelentkezhet'] = (int)$event['reserved_place'] < (int)$event['free_place'];
  }

  kereses($tipus, $kifejezes, $events);
}
