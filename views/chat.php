<form name="urlap" class="urlap" action="comment.php" method="post" onsubmit>
  <fieldset class="mezo_cs">
    <legend><h2>Hozzászólás</h2></legend>
    <label>Felhasználónév:</label><br/>
    <input type="text" name="fnev" size="40" maxlength="40"/><br/>
    <textarea cols="50" rows="5" maxlength="1000" placeholder="ide írj..."></textarea><br/>
    <input type="submit" value="Hozzászólás beküldése"/>
  </fieldset>
</form>

<?php if (!empty($chat)): ?>
  <table>
    <?php foreach ($chat as $kulcs => $fnev): ?>
      <tr>
        <td><?php echo $chat["fnev"], $chat["hozzaszolas"] ?>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>
