<?php
$routes = parse_ini_file('config/routing.ini', true);

if (isset($_GET['tartalom'])) {
  $tartalom = $_GET['tartalom'];
} else {
  $tartalom = 'fooldal';
}

$user = null;
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
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
  global $user;
  include "views/layouts/main.php";
  return true;
}
