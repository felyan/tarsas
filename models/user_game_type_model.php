<?php
include 'db.php';

function kereses_user_id_alapjan($user_id)
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
