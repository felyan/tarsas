<?php
include 'db.php';
if (isset($_POST['reg_submit'])) {
  $regSuccesCount = 0;

  if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
  }

  if (!empty($fullname) && !empty($email) && !empty($username) && !empty($password)) {
    $_SESSION['message'] = "Kérem, adjon meg minden adatot!";
  }

  if ($dbc->connect_error) {
    $_SESSION['message'] = "Sikertelen csatlakozás!";
  }

  $query = "
  INSERT INTO user
  (fullname, email, username, password)
  VALUES ('$fullname', '$email', '$username', SHA1('$password'))
  ";
  if ($dbc->query($query)) {
    $regSuccesCount++;
    $user_id = $dbc->insert_id;
  }

  foreach ($_POST['jatek-tipusok'] as $type_id) {
    echo $query = "
    INSERT INTO user_has_game_types
    (user_id, game_type_id)
    VALUES ('$user_id', '$type_id')
    ";
    if ($dbc->query($query)) {
      $regSuccesCount++;
    }
  }

  foreach ($_POST['sajat-jatekok'] as $game_id) {
    echo $query = "
    INSERT INTO user_has_games
    (user_id, games_id, sajat)
    VALUES ('$user_id', '$game_id', TRUE)
    ";
    if ($dbc->query($query)) {
      $regSuccesCount++;
    }
  }

  foreach ($_POST['szivesen-jatekok'] as $game_id) {
    echo $query = "
    INSERT INTO user_has_games
    (user_id, games_id, szivesen)
    VALUES ('$user_id', '$game_id', TRUE)
    ";
    if ($dbc->query($query)) {
      $regSuccesCount++;
    }
  }
  if ($regSuccesCount == 4) {
    $_SESSION['message'] = 'Sikeres regisztráció! :)';
  } else {
    $_SESSION['message'] = 'Valami nem stimmel! :(';
  }
}
								
