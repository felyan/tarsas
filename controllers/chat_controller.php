<?php
include "models/comment_model.php";
include "models/user_model.php";

function chat_lista()
{
  $chat = chat_bejegyzesek();
  foreach ($chat as $key => $item) {
    $chat[$key]['user'] = kereses_id_alapjan($item['user_id']);
  }
  return $chat;
}

if (isset($_POST['bekuldes'])) {
  ujbejegyzes($user['id'], $_POST['post']);
}

$chat = chat_lista();

