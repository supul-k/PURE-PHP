<?php
include './header.inc';
session_start();


if (isset($_SESSION['error_message'])) {
  // Display success message and unset the session variable
  // foreach ($_SESSION['error_messages'] as $error_message) {
  echo '<div class="error-message">' . $_SESSION['error_message'] . '</div>';
  // }
  unset($_SESSION['error_message']);
}
?>

<body>
<h1>Login Page</h1>
<form class="formLogin" method="POST" action="processEOI.php">
      <label for="email" class="labelRegistration ">Email:</label>
      <input  class="inputRegistration" type="text" id="email" name="email_login" required>
      
      
      <label for="password" class="labelRegistration">Password:</label>
      <input class="inputRegistration" type="password" id="password" name="password_login" required>
      
      
      
      <div class="buttonContainer">
        <input class="inputRegistration" type="submit" name="login" value="Login">
      </div>
    </form>
    
</body>


<?php
include './footer.inc';
?>