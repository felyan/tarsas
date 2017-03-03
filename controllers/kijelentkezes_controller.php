<?php
if (isset($_POST['kijelentkezes'])) {
  unset($_SESSION['user']);
  session_destroy();
}
