<?php require_once('../private/initialize.php'); ?>

<?php

  // Get requested ID
  $id = $_GET['id'] ?? false;
  if(!$id) {
    redirect_to('birds.php');
  }

  // Find bicycle using ID
  $bird = Bird::find_by_id($id);
  ?>

  <?php $page_title = 'Details:' . $bird->name(); ?>
  <?php include(SHARED_PATH . '/public_header.php'); ?>
  
  <div id="main">
  
    <a href="birds.php">Back to birds</a>
  
    <div id="page">
    <div class="detail">
      <dl>
        <dt>Name</dt>
        <dd><?php echo h($bird->common_name); ?></dd>
      </dl>
      <dl>
        <dt>habitat</dt>
        <dd><?php echo h($bird->habitat); ?></dd>
      </dl>
      <dl>
        <dt>food</dt>
        <dd><?php echo h($bird->food); ?></dd>
      </dl>
      <dl>
        <dt>conservation</dt>
        <dd><?php echo h($bird->conservation()); ?></dd>
      </dl>
      <dl>
        <dt>backyard tips</dt>
        <dd><?php echo h($bird->backyard_tips); ?></dd>
      </dl>

      </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>