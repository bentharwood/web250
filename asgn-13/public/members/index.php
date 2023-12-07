<?php require_once('../../private/initialize.php'); 
 require_login(); 
 require_level(2);

$page_title = 'user Menu'; 
 include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo url_for('/members/birds/birds.php'); ?>">birds</a></li>
      <li><a href="<?php echo url_for('/members/users.php'); ?>">users</a></li>
      <li><a href="<?php echo url_for('/members/logout.php'); ?>">logout</a></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
