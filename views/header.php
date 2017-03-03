<div class="wrapper cim">
  <header id="header">
    <a href="/" id="hgroup">
      <h1>Társasjátékszervező</h1>
      <h2>Találj magadnak játékostársakat itt!</h2>
    </a>
    <div>
      <?php if ($user): ?>
        Bejelentkezve:
        <?= $user['fullname'] ?>
        <div>
          <a href="<?= route('profil_kijelentkezes') ?>">
            Kijelentkezés
          </a>
        </div>
      <?php endif; ?>
    </div>
    <nav>
      <ul>
        <?php if ($user): ?>
          <li><a href="<?= route('profil_modositas') ?>">Profil módosítása</a></li>
        <?php endif; ?>
        <?php if (!$user): ?>
          <li><a href="<?= route('profil_regisztracio') ?>">Regisztráció</a></li>
        <?php endif; ?>
        <li><a href="<?= route('profil_bejelentkezes') ?>">Bejelentkezés</a></li>
        <li><a href="<?= route('igy_mukodik') ?>">Így működik</a></li>
      </ul>
    </nav>
  </header>
</div>
