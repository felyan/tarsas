<form class="urlap" method="post"
      action="<?= $user ? route('profil_modositas_action') : route('profil_regisztracio_action') ?>">
  <?php if ($user): ?>
    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
    <h1>"<?php echo $user['username'] ?>" felhasználó adatainak módosítása</h1>
  <?php else: ?>
    <h1>Regisztráció</h1>
  <?php endif; ?>
  <div>
    <fieldset class="mezo_cs">
      <legend class="urlap_cim">Alap adatok</legend>
      <label for="fullname">Név:</label><br>
      <input type="text" name="fullname" id="fullname"
             value="<?php echo $user ? $user['fullname'] : '' ?>"
             placeholder="Keresztnév Vezetéknév"/><br>
      <label for="cim">Város:</label><br>
      <input type="text" name="cim" id="cim"
             value="<?php echo $user ? $user['cim'] : '' ?>"><br>
      <label for="email">E-mail cím:</label><br>
      <input type="email" name="email" id="email"
             value="<?php echo $user ? $user['email'] : '' ?>"><br>
      <br>
      <label for="feltoltes">Tölts fel profilképet magadról:</label>
      <input type="file" name="feltoltes" id="feltoltes"/><br>
    </fieldset>
  </div>
  <div>
    <fieldset class="mezo_cs">
      <legend class="urlap_cim">Belépéshez szükséges adatok</legend>
      <label for="username">Felhasználónév:</label><br>
      <input type="text" name="username" id="username"
             value="<?php echo $user ? $user['username'] : '' ?>"><br>
      <label for="password">Jelszó:</label><br>
      <input type="password" name="password" id="password"><br>
      <label for="password_again">Jelszó még egyszer:</label><br>
      <input type="password" name="password_again" id="password_again"><br>
    </fieldset>
  </div>
  <div>
  <fieldset class="mezo_cs">
    <legend class="urlap_cim">Játék típusok</legend>
    <?php foreach ($view['gameTypes'] as $type): ?>
        <label for="jatek_tipusok"><?= $type['name'] ?></label>
        <input type="checkbox" name="jatek-tipusok[]" id="jatek_tipusok"
               value="<?= $type['id'] ?>" <?= $type['checked'] ? 'checked' : '' ?>>
    <?php endforeach; ?>
    <br><br>
    <legend class="urlap_cim">Saját játékok</legend>
    <select class="registration-multiple" name="sajat-jatekok[]" multiple>
      <?php foreach ($view['gamesOwn'] as $game): ?>
        <option value="<?= $game['id'] ?>" <?= $game['selected'] ? 'selected' : '' ?>>
          <?= $game['name'] ?>
        </option>
      <?php endforeach; ?>
    </select>
    <br><br>
      <legend class="urlap_cim">Amivel szívesen játszanék</legend>
      <select class="registration-multiple" name="szivesen-jatekok[]" multiple>
        <?php foreach ($view['gamesLike'] as $game): ?>
          <option value="<?= $game['id'] ?>" <?= $game['selected'] ? 'selected' : '' ?>>
            <?= $game['name'] ?>
          </option>
        <?php endforeach; ?>
      </select>
  </fieldset>
  </div>
  <fieldset class="mezo_cs">
    <legend class="urlap_cim">Amit még fontos tudni rólam:</legend>
    <textarea name="rolam" cols="50" rows="5" maxlength="1000" placeholder="ide írj..."></textarea><br>
    <input name="reg_submit" type="submit" value="Adatok küldése"/>
  </fieldset>
</form>
