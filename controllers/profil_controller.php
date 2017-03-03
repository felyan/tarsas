<?php
include 'models/user_model.php';
include 'models/game_model.php';

function regisztracio()
{
  return view('registration', [
    'gameTypes' => jatek_tipus_nev_alapjan(),
    'games' => jatek_kereses_nev_alapjan()
  ]);
}

function regisztracio_action()
{
  $user_id = felhasznalo_letrehozas($_POST['fullname'], $_POST['email'], $_POST['username'], $_POST['password']);
  if ($user_id) {
    felhasznalo_jatek_tipusok($_POST['jatek-tipusok'], $user_id);
    felhasznalo_jatekai($_POST['sajat-jatekok'], $user_id, true, false);
    felhasznalo_jatekai($_POST['szivesen-jatekok'], $user_id, false, true);
  }
  regisztracio();
}

function bejelentkezes()
{
  return view('bejelentkezes');
}

function bejelentkezes_action()
{
  $fnev = $_POST['username'];
  $jelszo = $_POST['password'];
  $users = kereses_fnev_alapjan($fnev);
  foreach ($users as $user) {
    if ($user['username'] == $fnev && $user['password'] == sha1($jelszo)) {
      $_SESSION['user'] = $user;
      header("location:/");
    }
  }
  return false;
}

function kijelentkezes()
{
  unset($_SESSION['user']);
  session_destroy();
  header("location:/");
}
