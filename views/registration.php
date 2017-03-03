<form class="urlap" method="post" action="<?= route('profil_regisztracio_action') ?>" onsubmit>
  <p>
  <fieldset class="mezo_cs">
    <legend><h2>Alap adatok</h2></legend>
    <label>Név:</label><br>
    <input type="text" name="fullname" placeholder="Keresztnév Vezetéknév"/><br>
    <label>Város:</label><br>
    <input type="text" name="cim"/><br>
    <label>E-mail cím:</label><br>
    <input type="email" name="email"><br>
    <br>
    <label><h3>Tölts fel profilképet magadról:</h3><input type="file" name="feltoltes"/><br>
  </fieldset>
  </p>
  <p>
  <fieldset class="mezo_cs">
    <legend><h2>Belépéshez szükséges adatok</h2></legend>
    <label>Felhasználónév:</label><br>
    <input type="text" name="username"/><br>
    <label>Jelszó:</label><br>
    <input type="password" name="password"/><br>
  </fieldset>
  </p>
  <p>
  <fieldset class="mezo_cs">
    <legend><h2>Játék típusok</h2></legend>
    <?php foreach ($view['gameTypes'] as $type): ?>
      <div>
        <label><?= $type['name'] ?></label>
        <input type="checkbox" name="jatek-tipusok[]" value="<?= $type['id'] ?>" checked>
      </div>
    <?php endforeach; ?>
    <br><br>
    <legend><h2>Saját játékok</h2></legend>
    <select class="registration-multiple" name="sajat-jatekok[]" multiple>
      <?php foreach ($view['games'] as $game): ?>
        <option value="<?= $game['id'] ?>"><?= $game['name'] ?></option>
      <?php endforeach; ?>
    </select>
  </p>
  <p>
    <legend><h2>Amivel szívesen játszanék</h2></legend>
    <select class="registration-multiple" name="szivesen-jatekok[]" multiple>
      <?php foreach ($view['games'] as $game): ?>
        <option value="<?= $game['id'] ?>"><?= $game['name'] ?></option>
      <?php endforeach; ?>
    </select>
    </fieldset>
  </p>
  <fieldset class="mezo_cs">
    <legend><h2>Amit még fontos tudni rólam:</h2></legend>
    <textarea name="rolam" cols="50" rows="5" maxlength="1000" placeholder="ide írj..."></textarea><br>
    <input name="reg_submit" type="submit" value="Adatok küldése"/>
  </fieldset>
</form>
