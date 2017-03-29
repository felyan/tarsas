<div class="urlap">
  <fieldset>
    <?php if (!empty($view['lista'])): ?>
      <?php foreach ($view['lista'] as $kulcs => $item): ?>
        <strong>
          <?= $item['user']['username'] ?>
        </strong>
        <div>
          <?= $item['date'] ?><br>
          <?= $item['post'] ?>
        </div>
        <br>
      <?php endforeach; ?>
    <?php endif; ?>
  </fieldset>
</div>
<?php if ($user): ?>
  <form name="urlap" class="urlap" action="<?= route('chat_action') ?>" method="post">
    <fieldset class="mezo_cs">
      <legend><h2>Hozzászólás</h2></legend>
      <p><?php echo $user["username"]?></p>
      <textarea class="input_100" rows="5" maxlength="1000"
                name="hozzaszolas"
                id="hozzaszolas"
                autofocus required
                placeholder="ide írj.."></textarea>
      <input type="hidden" name="user_id" value="<?php echo $user["id"]?>">
      <input type="submit" name="bekuldes" value="Hozzászólás beküldése">
    </fieldset>
  </form>
<?php else: ?>
  <div class="urlap">
    <h1>A funkció használatához be kell jelentkezni!</h1>
  </div>
<?php endif; ?>
