<div class="wrapper container">
  <div id="container">
    <section id="slider"><img src="/images/fejlec.png" alt=""></section>
    <div id="homepage">
      <section id="services">
        <article class="doboz">
          <figure>
            <a href="<?= route('ujesemeny') ?>" class="doboz-link">
              <img class="doboz-kep" src="/images/jatekikon1.png" width="210" height="150" alt="">
            </a>
            <figcaption>
              <h2>Új játék létrehozása</h2>
              <p>Itt tudsz új eseményt létrehozni,<br/> meghirdetni és meghívni rá másokat.</p>
              <footer class="more"><a href="<?= route('ujesemeny') ?>">Létrehozok</a></footer>
            </figcaption>
          </figure>
        </article>
        <article class="doboz">
          <figure>
            <a href="<?= route('kereses') ?>" class="doboz-link">
              <img class="doboz-kep" src="/images/jatekikon2.png" width="210" height="150" alt="">
            </a>
            <figcaption>
              <h2>Keresés a játékok között</h2>
              <p>Itt tudsz böngészni a mások által létrehozott események között, és itt tudsz jelentkezni, ha szívesen részt
                vennél.</p>
              <footer class="more"><a href="<?= route('kereses') ?>">Keresek</a></footer>
            </figcaption>
          </figure>
        </article>
        <article class="doboz">
          <figure>
            <a href="<?= route('chat') ?>" class="doboz-link">
              <img class="doboz-kep" src="/images/forum.jpg" width="210" height="150" alt="">
            </a>
            <figcaption>
              <h2>Chatszoba</h2>
              <p>Itt tudsz csevegni a többiekkel.</p>
              <footer class="more"><a href="<?= route('chat') ?>">Chatszoba</a></footer>
            </figcaption>
          </figure>
        </article>
      </section>
    </div>
  </div>
</div>
