<div class="urlap">
  <form action="<?= route('kereses') ?>" method="post">
    <h2>Kérem válasszon az alábbiak közül</h2>
    <select name="tipus">
      <option value=""></option>
      <option value="name" <?= $view['tipus'] == 'name' ? 'selected' : "" ?>>Játék neve alapján</option>
      <option value="type" <?= $view['tipus'] == 'type' ? 'selected' : "" ?>>Típus alapján</option>
      <option value="location" <?= $view['tipus'] == 'location' ? 'selected' : "" ?>>Helyszín alapján</option>
      <option value="username" <?= $view['tipus'] == 'username' ? 'selected' : "" ?>>Létrehozó alapján</option>
      <option value="date" <?= $view['tipus'] == 'date' ? 'selected' : "" ?>>Időpont alapján</option>
    </select>
    <p>
      Írja be a keresendő kifejezést:
      <input name="kifejezes" type="text" size="40" value="<?php echo $view['kifejezes'] ?>">
    </p>
    <input type="submit" name="kuldes" value="Keresés">
  </form>
</div>
<br><br>
<div class="urlap urlap--szeles">
  <?php
  switch ($view['tipus']) {
    case 'name':
      echo $view['kifejezes'] . "-t ezeken az eseményeken játszanak:";
      break;
    case 'type':
      echo $view['kifejezes'] . " típusú játékot ezeken az eseményeken játszanak:";
      break;
    case 'location':
      echo $view['kifejezes'] . " helyszínen a következő események vannak meghirdetve:";
      break;
    case 'username':
      echo $view['kifejezes'] . " által meghirdetett események:";
      break;
    case 'date':
      echo $view['kifejezes'] . " időpontra meghirdetett események:";
      break;
  }
  if (!empty($view['events'])): ?>
    <table class="table">
      <thead>
      <tr>
        <th>Játék neve</th>
        <th>Játék típusa</th>
        <th>Helyszín</th>
        <th>Létrehozó</th>
        <th>Leírás</th>
        <th>Kezdés</th>
        <th>Befejezés</th>
        <th>Szabad</th>
        <th>Foglalt</th>
      </tr>
      </thead>
      <tbody>

      <?php foreach ($view['events'] as $event): ?>

        <tr>
          <td><?php echo $event["name"] ?></td>
          <td><?php echo $event["type"] ?></td>
          <td><?php echo $event["location"] ?></td>
          <td><?php echo $event["username"] ?></td>
          <td><?php echo $event["description"] ?></td>
          <td><?php echo $event["date_start"] ?></td>
          <td><?php echo $event["date_end"] ?></td>
          <td><?php echo $event["free_place"] ?></td>
          <td><?php echo $event["reserved_place"] ?></td>
          <td>
            <?php if ($event["jelentkezhet"]): ?>
              <a class="button" href="<?= route('jelentkezes_action', ['event_id' => $event['id']]) ?>">
                Jelentkezem!
              </a>
            <?php else: ?>
              Betelt! :(
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>


