<?php
/*
 * A "controller" elején behívjuk azokat a "model"-eket, amiket itt használni fogunk.
 * Így elérhetőek lesznek a modelleken belüli metódusok.
 */
include 'models/user_model.php';
include 'models/game_model.php';

function regisztracio()
{
  global $user;
  $games = jatek_kereses_nev_alapjan();
  if ($user) {
    $userGames = felhasznalo_jatekai_select($user['id']);
  }
  if (!isset($userGames) or !is_array($userGames)) {
    $userGames = [];
  }
  $gamesOwnId = [];
  $gamesLikeId = [];
  foreach ($userGames as $game) {
    if ((int)$game['sajat']) {
      $gamesOwnId [] = $game['id'];
    }
    if ((int)$game['szivesen']) {
      $gamesLikeId [] = $game['id'];
    }
  }
  $gamesOwn = $games;
  $gamesLike = $games;
  foreach ($games as $key => $game) {
    $gamesOwn[$key]['selected'] = ($user and in_array($game['id'], $gamesOwnId));
    $gamesLike[$key]['selected'] = ($user and in_array($game['id'], $gamesLikeId));
  }
  $gameTypes = jatek_tipus_nev_alapjan();
  if ($user) {
    $userGameTypes = felhasznalo_jatek_tipusok_select($user['id']);
  } else {
    $userGameTypes = [];
  }
  foreach ($gameTypes as $key => $tipus) {
    $gameTypes[$key]['checked'] = ($user and in_array($tipus['id'], $userGameTypes));
  }
  return view('registration', [
    'gameTypes' => $gameTypes,
    'gamesOwn' => $gamesOwn,
    'gamesLike' => $gamesLike
  ]);
}

function regisztracio_action()
{
  $user_id = felhasznalo_letrehozas($_POST['fullname'], $_POST['email'], $_POST['username'], $_POST['password']);
  if ($user_id) {
    felhasznalo_jatek_tipusok_insert($_POST['jatek-tipusok'], $user_id);
    felhasznalo_jatekai_insert($_POST['sajat-jatekok'], $user_id, true, false);
    felhasznalo_jatekai_insert($_POST['szivesen-jatekok'], $user_id, false, true);
  }
  regisztracio();
}

function bejelentkezes()
{
  return view('bejelentkezes');
}

/*
 * A bejelentkezett felhasználó adatait eltároljuk a globális SESSION tömbben,
 * hogy később elérhető legyen más oldalakon is.
 */
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

function modositas_action()
{
  $user_id = $_POST['user_id'];
  felhasznalo_modositas($_POST['fullname'], $_POST['email'], $_POST['username'], $_POST['password'], $user_id);
  if ($user_id) {
    felhasznalo_jatek_tipusok_insert($_POST['jatek-tipusok'], $user_id);
    felhasznalo_jatekai_insert($_POST['sajat-jatekok'], $user_id, true, false);
    felhasznalo_jatekai_insert($_POST['szivesen-jatekok'], $user_id, false, true);
  }
  regisztracio();
}

function kijelentkezes()
{
  unset($_SESSION['user']);
  session_destroy();
  redirect('fooldal');
}
