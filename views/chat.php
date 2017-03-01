<?php
include "controllers/chat_controller.php";
?>

<div class="urlap">
  <fieldset>
    <?php if (!empty($chat)): ?>
      <?php foreach ($chat as $kulcs => $item): ?>
        <strong>
          <?= $item['user']['username'] ?>
        </strong>
        <div>
          <?= $item['post'] ?>
        </div>
        <br>
      <?php endforeach; ?>
    <?php endif; ?>
  </fieldset>
</div>

<form name="urlap" class="urlap" method="post" onsubmit>
  <fieldset class="mezo_cs">
    <legend><h2>Hozzászólás</h2></legend>
    <textarea cols="50" rows="5" maxlength="1000"
              name="post"
              placeholder="ide írj..."></textarea>
    <input type="submit" name="bekuldes" value="Hozzászólás beküldése"/>
  </fieldset>
</form>
