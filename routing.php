<?php
/*
 * A routing felelős azért, hogy a megfelelő helyre irányuljon a kérés (szakkifejezés: request).
 * Az ini fájlból kiolvassuk a porjekt specifikus routing beállításokat.
 */
$routes = parse_ini_file('config/routing.ini', true);

/*
 * A GET globális tömb "tartalom" változójából tudjuk, hogy merre irányuljon a kérés.
 */
if (isset($_GET['tartalom'])) {
  $tartalom = $_GET['tartalom'];
} else {
  $tartalom = 'fooldal';
}

/*
 * Ha már bejelentkezett a felhasználó, akkor a SESSION globális tömbben benne lesznek az adatai!
 */
$user = null;
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
}

/*
 * A $tartalom változó alapján keressük ki a $routing tömbből az adott kéréshez
 * tartozó beállításokat.
 * Itt derül ki, hogy a kéréshez milyen "controller"-re, annak melyik metódusára
 * van szükség.
 */
if (isset($routes[$tartalom])) {
  $route = $routes[$tartalom];
  include "controllers/" . $route['uses'] . ".php";
  if (isset($route['method'])) {
    $routeMethod = $route['method'];
    $routeMethod();
  }
}

function uzenet($szoveg)
{
  $_SESSION['message'] = $szoveg;
}

function uzenet_kiir()
{
  if (!isset($_SESSION['message'])) {
    return false;
  }
  $uzenet = $_SESSION['message'];
  unset($_SESSION['message']);
  return $uzenet;
}

function validalas($kulcsok, $method)
{
  $methodUpper = '_' . strtoupper($method);
  global ${$methodUpper};
  $globalArray = ${$methodUpper};
  $okList = [];
  foreach ($kulcsok as $kulcs) {
    if (isset($globalArray[$kulcs]) && !empty($globalArray[$kulcs])) {
      $okList[$kulcs] = true;
    }
  }
  return count($okList) === count($kulcsok);
}

/*
 * Ez a "helper" eljárás arra jó, hogy a megfelelő formában írja ki az elrési útvonalat.
 * Tipikus felhasznállási terület: a menüben vagy fejlécben kiírt linkek "href" attribútuma.
 * Másik felhasználási terület: a formok "action" attribútuma.
 */
function route($key, $args = null)
{
  global $routes;
  $path = '';
  if (isset($routes[$key])) {
    $path = '/index.php?tartalom=' . $key;
  }
  if (!is_null($args)) {
    $argString = [];
    foreach ($args as $key => $val) {
      $argString [] = $key . '=' . $val;
    }
    $path .= '&' . implode($argString, '&');
  }
  return $path;
}

/**
 * Ezzel az eljárással jelenítjük meg a "view" fájlokat.
 * A második argumentum, a $view tárolja az összes változót, amit a "controller"-ben át akartunk adni.
 * A view elrárást csak a "controller"-ben vagy egy "view"-ban hívjuk meg, máshol nincs helye.
 *
 * @param $viewName
 * @param array $view
 * @return bool
 */
function view($viewName, $view = [])
{
  global $user;
  $view['message'] = uzenet_kiir();
  include "views/layouts/main.php";
  return true;
}

function redirect($key, $args = null, $concat = '')
{
  $location = "location:" . route($key, $args) . $concat;
  header($location);
}
