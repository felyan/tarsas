<?php
include "models/game_model.php";
include "models/user_model.php";
include "models/event_model.php";

function ujesemeny()
{
  global $user;
  $gameTypes = jatek_tipus_nev_alapjan();
  $ownGames = jatekok_user_id_alapjan($user["id"]);
  view('ujesemeny', [
    'gameTypes' => $gameTypes,
    'ownGames' => $ownGames
  ]);
}

function ujesemeny_action()
{
  global $user;
  esemeny_insert($user['id'], $_POST['game_id'], $_POST['date_start'], $_POST['date_end'],
    $_POST['cim'], $_POST['leiras'], $_POST['szabad_helyek']);
  ujesemeny();
}

function jelentkezes_action()
{
  global $user;
  $siker = esemeny_jelentkezes($user['id'], $_GET['event_id']);
  if ($siker) {
    uzenet('A jelentkezésedet rögzítettük!');
  } else {
    uzenet('Jelentkezésedet nem tudtuk rögzíteni');
  }
  redirect('kereses');
}
