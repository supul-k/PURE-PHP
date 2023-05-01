<?php
include './header.inc';

session_start();

if (isset($_SESSION['success_message'])) {
  // Display success message and unset the session variable
  echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
  unset($_SESSION['success_message']);
}

if (isset($_SESSION['error_message'])) {
  // Display success message and unset the session variable
  // foreach ($_SESSION['error_messages'] as $error_message) {
  echo '<div class="error-message">' . $_SESSION['error_message'] . '</div>';
  // }
  unset($_SESSION['error_message']);
}
?>

<body>
  <h1>Registration Page</h1>

  <form class="formRegistration" method="post" action="processEOI.php">
    <label for="email" class="labelRegistration ">Email:</label>
    <input class="inputRegistration" type="text" id="email" name="email_register" required>

    <label for="username" class="labelRegistration">Username:</label>
    <input class="inputRegistration" type="text" id="username" name="username_register" required>

    <label for="role" class="labelRegistration">Role:</label>
    <div>
      <label><input class="inputRegistration" type="radio" id="admin" name="role" value="admin" required="">Admin</label>
      <label><input class="inputRegistration" type="radio" id="user" name="role" value="user">User</label> <br>
      <span id="genderError" class="error"></span>
    </div>

    <label for="password" class="labelRegistration">Password:</label>
    <input class="inputRegistration" type="password" id="password" name="password" required>

    <label for="confirm-password" class="labelRegistration">Confirm Password:</label>
    <input class="inputRegistration" type="password" id="confirm-password" name="confirm-password" required>

    <div class="buttonContainer">
      <input class="inputRegistration" type="submit" name="register" value="register">
    </div>
  </form>

</body>


<?php
include './footer.inc';
?>