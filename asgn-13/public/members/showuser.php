<?php require_once('../../private/initialize.php');
require_login();
require_level(2);


$id = $_GET['id'] ?? '1';

$user = users::find_by_id($id);

?>

<?php $page_title = 'Show user: ' . h($user->full_name()); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/users.php'); ?>">&laquo; Back to List</a>

  <div class="user show">

    <h1>user: <?php echo h($user->full_name()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>First name</dt>
        <dd><?php echo h($user->first_name); ?></dd>
      </dl>
      <dl>
        <dt>Last name</dt>
        <dd><?php echo h($user->last_name); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($user->email); ?></dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($user->username); ?></dd>
      </dl>
      <dl>
        <dt>user level</dt>
        <dd><?php echo h($user->user_level); ?></dd>
      </dl>
    </div>

  </div>

</div>