<?php
include "models/game_model.php";
include "models/user_model.php";

$gameTypes = jatek_tipus_nev_alapjan();
$ownGameTypes = kereses_user_id_alapjan($user["id"]);
$cim = kereses_cim_alapjan($user["cim"]);

