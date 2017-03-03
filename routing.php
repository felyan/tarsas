<?php
$routes = [
  'fooldal' => [
    'uses' => 'fooldal_controller'
  ],
  'bejelentkezes' => [
    'uses' => 'bejelentkezes_controller'
  ],
  'profil_regisztracio' => [
    'uses' => 'profil_controller',
    'method' => 'regisztracio'
  ],
  'profil_regisztracio_action' => [
    'uses' => 'profil_controller',
    'method' => 'regisztracio_action'
  ],
  'profil_bejelentkezes' => [
    'uses' => 'profil_controller',
    'method' => 'bejelentkezes'
  ],
  'profil_bejelentkezes_action' => [
    'uses' => 'profil_controller',
    'method' => 'bejelentkezes_action'
  ],
  'profil_modositas' => [
    'uses' => 'profil_controller',
    'method' => 'modositas'
  ],
  'profil_kijelentkezes' => [
    'uses' => 'profil_controller',
    'method' => 'kijelentkezes'
  ]
];

if (isset($_GET['tartalom'])) {
  $tartalom = $_GET['tartalom'];
} else {
  $tartalom = 'fooldal';
}

if (isset($routes[$tartalom])) {
  $route = $routes[$tartalom];
  include "controllers/" . $route['uses'] . ".php";
  if (isset($route['method'])) {
    $routeMethod = $route['method'];
    $routeMethod();
  }
}

function route($key)
{
  global $routes;
  if (isset($routes[$key])) {
    echo '/index.php?tartalom=' . $key;
  }
}

function view($viewName, $view = [])
{
  $user = null;
  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
  }
  include "views/layouts/main.php";
  return true;
}
