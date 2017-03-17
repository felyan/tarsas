<form class="urlap" action="route('kereses_action')" method="post">
  <h2>Kérem válasszon az alábbiak közül</h2>
  <select name="tipus">
    <option value=""></option>
    <option value="name" <?php $view['tipus'] == 'name' ? 'selected' : "" ?>>Játék neve alapján</option>
    <option value="type" <?php $view['tipus'] == 'type' ? 'selected' : "" ?>>Típus alapján</option>
    <option value="location" <?php $view['tipus'] == 'location' ? 'selected' : "" ?>>Helyszín alapján</option>
    <option value="username" <?php $view['tipus'] == 'username' ? 'selected' : "" ?>>Létrehozó alapján</option>
    <option value="date" <?php $view['tipus'] == 'date' ? 'selected' : "" ?>>Időpont alapján</option>
  </select>
  <p>
    Írja be a keresendő kifejezést:
    <input name="kifejezes" type="text" size="40" value="<?php echo $view['kifejezes'] ?>"/>
  </p>
  <input type="submit" name="kuldes" value="Keresés"/>
</form>

<?php if (!empty($view['events'])): ?>
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

    <?php foreach ($view['events'] as $event): ?>

      <tr>
        <td><?php echo $event["name"] ?></td>
        <td><?php echo $event["type"] ?></td>
        <td><?php echo $event["username"] ?></td>
        <td><?php echo $event["location"] ?></td>
      </tr>

    <?php endforeach; ?>

    </tbody>
  </table>
<?php endif; ?>



