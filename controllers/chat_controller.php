<?php
include "models/comment_model.php";
include "models/user_model.php";

function hozzaszolasok_listazasa()
{
  $chat = chat_bejegyzesek();
  foreach ($chat as $key => $item) {
    $chat[$key]['user'] = kereses_id_alapjan($item['user_id']);
  }
  view('chat', ['lista' => $chat]);
}

function hozzaszolas_bekuldese_action()
{
  global $user;
  hozzaszolas($user['id'], $_GET['chat_id']);
  $_SESSION['message'] = 'A hozzászólásodat rögzítettük!';
  hozzaszolasok_listazasa();
}
