<?php

if (isset($_POST["tipus"])) {
  $tipus = $_POST["tipus"];
} elseif (isset($_GET["tipus"])) {
  $tipus = $_GET["tipus"];
}

if (isset($_POST["kifejezes"])) {
  $kifejezes = $_POST["kifejezes"];
} else {
  $kifejezes = "";
}

?>

<form class="urlap" action="index.php?tartalom=eredmeny_games" method="post">
  <h2>Kérem válasszon az alábbiak közül</h2>
  <select name="tipus">
    <option value=""></option>
    <option value="name" <?php if ($tipus == 'name') {
      echo 'selected';
    } ?>>Játék neve alapján
    </option>
    <option value="name" <?php $tipus == 'name' ? 'selected' : "" ?>>Játék neve alapján</option>
    <option value="type" <?php $tipus == 'type' ? 'selected' : "" ?>>Típus alapján</option>
    <option value="location" <?php $tipus == 'location' ? 'selected' : "" ?>>Helyszín alapján</option>
    <option value="username" <?php $tipus == 'username' ? 'selected' : "" ?>>Létrehozó alapján</option>
    <option value="date" <?php $tipus == 'date' ? 'selected' : "" ?>>Időpont alapján</option>
  </select>
  <p>
    Írja be a keresendő kifejezést:
  <input name="kifejezes" type="text" size="40" value="<?php echo $kifejezes ?>"/>
  </p>
  <input type="submit" name="kuldes" value="Keresés"/>
</form>


<?php if (isset($hibaKod)) {
  switch ($hibaKod) {
    case 1:
      echo 'Töltse ki az űrlapot!';
      break;
    case 2:
      echo 'Nem sikerült csatlakozni!';
      break;
    case 3:
      echo 'Nincs eredmény';
      break;
  }
} ?>

<?php if (!empty($games)): ?>


  <table>
    <thead>
    <tr>
      <th>Játék neve</th>
      <th>Játék típusa</th>
      <th>Helyszín</th>
      <th>Létrehozó</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($games as $kulcs => $game_name): ?>

      <tr>
        <td><?php echo $games["name"] ?></td>
        <td><?php echo $games["type"] ?></td>
        <td><?php echo $user["name"] ?></td>
        <td><?php echo $user["location"] ?></td>
      </tr>

    <?php endforeach; ?>

    </tbody>
  </table>
<?php endif; ?>



