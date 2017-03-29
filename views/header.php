<div class="wrapper cim">
  <header id="header">
    <a href="/" id="hgroup">
      <h1>Társasjátékszervező</h1>
      <h2>Találj magadnak játékostársakat itt!</h2>
    </a>
    <nav>
      <ul>
        <?php if ($user): ?>
          <li><a href="<?= route('profil_modositas') ?>">Profil módosítása</a></li>
          <li><a href="<?= route('profil_kijelentkezes') ?>">Kijelentkezés</a></li>
        <?php else: ?>
          <li><a href="<?= route('profil_regisztracio') ?>">Regisztráció</a></li>
          <li><a href="<?= route('profil_bejelentkezes') ?>">Bejelentkezés</a></li>
        <?php endif; ?>
        <li><a href="<?= route('igymukodik') ?>">Így működik</a></li>
      </ul>
    </nav>
    <div class="session">
      <?php if ($user): ?>
      <br>
      Bejelentkezve:<br>
      <?= $user['fullname'] ?><br>
      <a href="<?= route('sajat_esemenyek') ?>">Saját események</a>
    </div>
    <?php endif; ?>
  </header>
</div>

