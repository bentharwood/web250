<?php

require_once('../../private/initialize.php');
require_login();
require_level(2);


if (!isset($_GET['id'])) {
  redirect_to(url_for('/members/index.php'));
}
$id = $_GET['id'];
$user = users::find_by_id($id);
if ($user == false) {
  redirect_to(url_for('/members/index.php'));
}

if (is_post_request()) {

  $result = $user->delete();
  $_SESSION['message'] = 'The user was deleted successfully.';
  redirect_to(url_for('/members/index.php'));
} else {
}

?>

<?php $page_title = 'Delete user'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="user delete">
    <h1>Delete user</h1>
    <p>Are you sure you want to delete this user?</p>
    <p class="item"><?php echo h($user->full_name()); ?></p>

    <form action="<?php echo url_for('/members/deleteuser.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete user" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>