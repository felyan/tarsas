<?php if ($user): ?>

  <form class="urlap" action="<?= route('ujesemeny_action')?>" method="post">
    <fieldset class="mezo_cs">
      <legend class="urlap_cim">Saját játékok</legend>
      <select name="game_id">
        <?php foreach ($view['ownGames'] as $game): ?>
          <option value="<?= $game['id'] ?>">
            <?= $game['name'] ?> (Max: <?= $game['member_max'] ?>)
          </option>
        <?php endforeach; ?>
      </select>
      <br><br>
      <div>
        <label class="urlap_cim" for="szabad_helyek">Szabad helyek:</label><br>
        <input type="number" name="szabad_helyek" id="szabad_helyek" value="2">
      </div>
      <br>
      <div>
        <label class="urlap_cim" for="date_start">Kezdés:</label><br>
        <input type="date" name="date_start" id="date_start"
               value="<?= date('Y-m-d H:00:00') ?>">
      </div>
      <br>
      <div>
        <label class="urlap_cim" for="date_end">Befejezés:</label><br>
        <input type="date" name="date_end" id="date_end"
               value="<?= date('Y-m-d H:00:00') ?>">
      </div>
      <br>
      <div>
        <label class="urlap_cim" for="cim">Helyszín:</label><br>
        <input type="text" name="cim" id="cim" class="input_100"
               value="<?= $user['cim'] ?>">
      </div>
      <br>
      <div>
        <label class="urlap_cim" for="leiras">Leírás:</label><br>
        <textarea name="leiras" id="leiras" class="input_100" placeholder="ide írj..."></textarea><br><br>
        <button name="event_submit" type="submit">Esemény létrehozása</button>
      </div>
    </fieldset>
  </form>
<?php else: ?>
  <div class="urlap">
    <h1>A funkció használatához be kell jelentkezni!</h1>
  </div>
<?php endif; ?>




