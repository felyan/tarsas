<?php
include "controllers/ujesemeny_controller.php";
?>

<?php if ($user): ?>

  <form class="urlap" method="post" onsubmit>
    <fieldset class="mezo_cs">
      <legend><h2>Játék típusa</h2></legend>
      <?php foreach ($gameTypes as $type): ?>
        <div>
          <label><?= $type['name'] ?></label>
          <input type="checkbox" name="jatek-tipusok[]" value="<?php echo $type['id'] ?>" checked>
        </div>
      <?php endforeach; ?>
      <br><br>
      <legend><h2>Saját játékok</h2></legend>
      <select class="registration-multiple" name="sajat-jatekok[]" multiple>
        <?php foreach ($ownGameTypes as $game): ?>
          <option value="<?php echo $game['id'] ?>"><?php echo $game['name'] ?></option>
        <?php endforeach; ?>
      </select>
    </fieldset>
  </form>
<?php else: ?>
<div class="urlap">
  <h1>A funkció használatához be kell jelentkezni</h1>
</div>
<?php endif; ?>




