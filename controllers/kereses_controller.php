<?php
include "models/game_model.php";
include "models/user_model.php";
include "models/event_model.php";

function kereses($events = [])
{
  global $user;
  view('kereses', [
    'tipus' => '',
    'kifejezes' => '',
    'events' => $events
  ]);
}

function kereses_action()
{
  // TODO: A keresést intéző eljárás kiválasztása a $_POST['tipus'] alapján
  // TODO: Használj switch elágazást!
  $events = kereses_usernev_alapjan($fnev);
  kereses($events);
}
