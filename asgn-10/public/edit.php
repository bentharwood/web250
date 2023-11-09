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

  // Save record using post parameters
  $args = $_POST['bird'];

  $bird->merge_attributes($args);
  $result = $bird->save();

  if($result === true) {
    $_SESSION['message'] = 'The Bird was updated successfully.';
    redirect_to(url_for('/detail.php?id=' . $id));
  } else {
    // show errors
  }
}else {

  // display the form
}





/* 
  Use the bicycles/staff/edit.php file as a guide 
  so your file mimics the same functionality.
  Be sure to include the display_errors() function.
*/

 $page_title = 'Edit Bird'; 
 include(SHARED_PATH . '/public_header.php');  ?>
 <div id="content">

 <a class="back-link" href="<?php echo url_for('index.php'); ?>">&laquo; Back to List</a>
  <div class="bird edit">
    <h1>Edit bird</h1>

    <?php echo display_errors($bird->errors); ?>

    <form action="<?php echo url_for('/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>
      
      <div id="operations">
        <input type="submit" value="Edit bird" />
      </div>
    </form>

  </div>

</div>





 <?php include(SHARED_PATH . '/public_footer.php'); ?>
