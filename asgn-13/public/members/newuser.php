<?php

require_once('../../private/initialize.php');
require_login();
require_level(2);


if (is_post_request()) {

  $args = $_POST['user'];
  $user = new users($args);
  $result = $user->save();

  if ($result === true) {
    $new_id = $user->id;
    $_SESSION['message'] = 'The user was created successfully.';
    redirect_to(url_for('/members/showuser.php?id=' . $new_id));
  } else {
  }
} else {
  $user = new users;
}

?>

<?php $page_title = 'Create user'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/index.php'); ?>">&laquo; Back to List</a>

  <div class="user new">
    <h1>Create user</h1>

    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo url_for('members/newuser.php'); ?>" method="post">

      <?php include('userform_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create user" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>