<?php
include "models/game_model.php";
include "models/user_model.php";
include "models/event_model.php";

function kereses()
{
  $tipus = isset($_POST['tipus']) ? $_POST['tipus'] : 'date';
  $kifejezes = isset($_POST['kifejezes']) ? $_POST['kifejezes'] : date('Y-m-d');
  view('kereses', [
    'tipus' => $tipus,
    'kifejezes' => $kifejezes,
    'events' => esemeny_kereses($tipus, $kifejezes)
  ]);
}

function sajat_esemenyek()
{
  global $user;
  view('kereses', [
    'tipus' => 'username',
    'kifejezes' => $user['username'],
    'events' => esemeny_kereses('user_id', $user['id'])
  ]);
}
