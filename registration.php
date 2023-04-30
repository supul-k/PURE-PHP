<?php
include './header.inc';
?>

<body>
<h1>Registration Page</h1>
    <form class=" formRegistration ">
      <label for="email" class="labelRegistration ">Email:</label>
      <input  class="inputRegistration" type="text" id="email" name="email" required>
      
      <label for="username" class="labelRegistration">Username:</label>
      <input class="inputRegistration" type="text" id="username" name="username" required>
      
      <label for="password" class="labelRegistration">Password:</label>
      <input class="inputRegistration" type="password" id="password" name="password" required>
      
      <label for="confirm-password" class="labelRegistration">Confirm Password:</label>
      <input class="inputRegistration" type="password" id="confirm-password" name="confirm-password" required>
      
      <div class="buttonContainer">
        <input class="inputRegistration" type="submit" value="Register">
      </div>
    </form>
    
</body>


<?php
include './footer.inc';
?>