<?php if ($user): ?>
<h1>
  A bejelentkezés sikeres!
</h1>
<h2>
  Üdvözlünk újra, <?=$user['fullname']?>
</h2>
<?php endif; ?>
<form name="urlap" class="urlap" method="post" action="<?= route('profil_bejelentkezes_action') ?>">
  <fieldset class="mezo_cs">
    <legend><h2>Belépéshez szükséges adatok:</h2></legend>
    <label>Felhasználónév:</label><br/>
    <input type="text" name="username" size="40" maxlength="40"/><br/>
    <label>Jelszó:</label><br/>
    <input type="password" name="password" size="40" maxlength="40"/><br/>
    <input type="submit" name="belepes" value="Belépés">
  </fieldset>
</form>
