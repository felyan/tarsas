<?php
include "models/game_model.php";
include "models/user_model.php";
include "models/event_model.php";

function kereses($tipus = 'date', $kifejezes = null)
{
  global $user;
  if (is_null($kifejezes)) {
    $kifejezes = date('Y-m-d');
  }
  view('kereses', [
    'tipus' => $tipus,
    'kifejezes' => $kifejezes,
    'events' => esemeny_kereses($tipus, $kifejezes)
  ]);
}

function kereses_action()
{
  $kifejezes = $_POST['kifejezes'];
  $tipus = $_POST['tipus'];
  kereses($tipus, $kifejezes);
}
