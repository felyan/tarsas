<?php
include 'db.php';

function chat_bejegyzesek()
{
  global $dbc;
  $kimenet = [];
  $query = "SELECT *
            FROM chat
   ";
  if ($eredmeny = $dbc->query($query)) {
    while ($sor = $eredmeny->fetch_array()) {
      $kimenet[] = $sor;
    }
  }
  return $kimenet;
}

function ujbejegyzes($user_id, $post)
{
  global $dbc;
  $query = "INSERT INTO chat
            (user_id, post)
            VALUES ($user_id, '$post')
   ";
  if ($dbc->query($query)) {
    return true;
  }
  return false;
}
