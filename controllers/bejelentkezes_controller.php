<?php
include "models/user_model.php";

function bejelentkezes($fnev, $jelszo)
{
  $users = kereses_fnev_alapjan($fnev);
  foreach ($users as $user) {
    if ($user['username'] == $fnev && $user['password'] == sha1($jelszo)) {
      return $user;
    }
  }
  return false;
}

if (isset($_POST['belepes'])) {
  $user = bejelentkezes($_POST['username'], $_POST['password']);
  $_SESSION['user'] = $user;
}
