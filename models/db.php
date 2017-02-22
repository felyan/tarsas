<?php
header('Content-Type: text/html; charset=utf-8');

$dbc = mysqli_connect('localhost', 'root', 'password');
$dbc->set_charset("utf8");
$dbc->select_db('tarsas');
