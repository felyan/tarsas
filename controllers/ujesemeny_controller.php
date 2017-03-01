<?php
include "models/game_type_model.php";
include "models/user_game_type_model.php";

$gameTypes = kereses_name_alapjan();
$ownGameTypes = kereses_user_id_alapjan($user["id"]);

