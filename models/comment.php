<?php
include "bejelentkezes.php";
header('Content-Type: text/html;charset/utf-8');

var_dump($_POST);

echo $query = "INSERT INTO chat SET 
user_name = '".$_POST['username']."',
post = '".$_POST['post']."'";

mysqli_close($dbc);

?>
