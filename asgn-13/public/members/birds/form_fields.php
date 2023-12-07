<?php

/* 
  Use the bicycles/staff/form_fields.php file as a guide 
  so your file mimics the same functionality.
 
  
*/
if(!isset($bird)) {
  redirect_to(url_for('birds.php'));
}?>

<dl>
  <dt>Name</dt>
  <dd><input type="text" name="bird[common_name]" value="<?php echo h($bird->common_name); ?>"></dd>
</dl>
<dl>
  <dt>habitat</dt>
  <dd><input type="text" name="bird[habitat]" value="<?php echo h($bird->habitat); ?>"></dd>
</dl>
<dl>
  <dt>food</dt>
  <dd><input type="text" name="bird[food]" value="<?php echo h($bird->food); ?>"></dd>
</dl>
<dl>
  <dt>Conservation</dt>
  <dd><select name="bird[conservation_id]">
    <option value=""></option>
    <?php foreach(Bird::CONSERVATION_OPTIONS as $cond_id => $cond_name) { ?>
      <option value="<?php echo $cond_id; ?>" <?php if($bird->conservation_id == $cond_id) { echo 'selected'; } ?>><?php echo $cond_name; ?></option> <?php } ?>
  </select></dd>
</dl>
<dl>
  <dt>Backyard Tips</dt>
  <dd><textarea name="bird[backyard_tips]" rows="5" cols="50"><?php echo h($bird->backyard_tips); ?></textarea></dd>
</dl>


