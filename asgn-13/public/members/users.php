<?php require_once('../../private/initialize.php');
require_login();
require_level(2);

$users = users::find_all();

?>
<?php $page_title = 'users'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
  <div class="user listing">
    <h1>users</h1>
    <a href="newuser.php">Create a new user</a>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Username</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($users as $user) { ?>
        <tr>
          <td><?php echo h($user->id); ?></td>
          <td><?php echo h($user->first_name); ?></td>
          <td><?php echo h($user->last_name); ?></td>
          <td><?php echo h($user->email); ?></td>
          <td><?php echo h($user->username); ?></td>
          <td><a class="action" href="<?php echo url_for('/members/showuser.php?id=' . h(u($user->id))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/members/edituser.php?id=' . h(u($user->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/members/deleteuser.php?id=' . h(u($user->id))); ?>">Delete</a></td>
        </tr>
      <?php } ?>
    </table>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>