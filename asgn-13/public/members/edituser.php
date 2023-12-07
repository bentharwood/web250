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
  redirect_to(url_for('members/index.php'));
}

if (is_post_request()) {

  $args = $_POST['user'];
  $user->merge_attributes($args);
  $result = $user->save();

  if ($result === true) {
    $_SESSION['message'] = 'The user was updated successfully.';
    redirect_to(url_for('members/showuser.php?id=' . $id));
  } else {
  }
} else {
}

?>

<?php $page_title = 'Edit user'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('members/users.php'); ?>">&laquo; Back to List</a>

  <div class="user edit">
    <h1>Edit user</h1>

    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo url_for('members/edituser.php?id=' . h(u($id))); ?>" method="post">

      <?php include('userform_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit user" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>