<?php

require_once('../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('index.php'));
}
$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if($bird == false) {
  redirect_to(url_for('index.php'));
}

if(is_post_request()) {

  // Delete bird
  $bird->delete();

  $_SESSION['message'] = 'The bird was deleted successfully.';
  redirect_to(url_for('birds.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('birds.php'); ?>">&laquo; Back to List</a>

  <div class="bird delete">
    <h1>Delete bird</h1>
    <p>Are you sure you want to delete this bird?</p>
    <p class="item"><?php echo h($bird->name()); ?></p>

    <form action="<?php echo url_for('delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete bird" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
