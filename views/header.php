<div class="wrapper cim">
  <header id="header">
    <a href="/" id="hgroup">
      <h1>Társasjátékszervező</h1>
      <h2>Találj magadnak játékostársakat itt!</h2>
      <div>
        <?php if ($user): ?>
          Bejelentkezve:
          <?= $user['fullname'] ?>
        <?php endif; ?>
      </div>
    </a>
    <nav>
      <ul>
        <li><a href="index.php?tartalom=registration">Regisztráció</a></li>
        <li><a href="index.php?tartalom=bejelentkezes">Bejelentkezés</a></li>
        <li><a href="index.php?tartalom=igymukodik">Így működik</a></li>
      </ul>
    </nav>
  </header>
</div>
