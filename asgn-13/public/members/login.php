<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

$recaptcha_secret = '6LfvCykpAAAAAJ3HW56oH82Gq80qDCi2vdhk1hRn'; // Your reCAPTCHA Secret Key
$response = $_POST['g-recaptcha-response'];

$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$response}");
$captcha_success = json_decode($verify);

if ($captcha_success->success) {
  // Captcha verification successful
  // Process your form submission logic here
  // Example: Send email, save to database, etc.
  if (is_post_request()) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validations
    if (is_blank($username)) {
      $errors[] = "Username cannot be blank.";
    }
    if (is_blank($password)) {
      $errors[] = "Password cannot be blank.";
    }

    // if there were no errors, try to login
    if (empty($errors)) {
      $user = users::find_by_username($username);
      // test if user found and password is correct
      if ($user != false && $user->verify_password($password)) {
        // Mark user as logged in
        $session->login($user);
        redirect_to(url_for('/members/index.php'));
      } else {
        // username not found or password does not match
        $errors[] = "Log in was unsuccessful.";
      }
    }
  }
} else {
  // Captcha verification failed
  echo "Failed! Please complete the reCAPTCHA.";
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <div class="g-recaptcha" data-sitekey="6LfvCykpAAAAAFPLxvZzTJkk-jp3FRmY9s1GLwsh"></div>
    <input type="submit" name="submit" value="Submit" />
  </form>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>