<?php
include './header.inc';
?>

<body>
<h1>Login Page</h1>
    <form class=" formRegistration ">
      <label for="email" class="labelRegistration ">Email:</label>
      <input  class="inputRegistration" type="text" id="email" name="email" required>
      
      
      <label for="password" class="labelRegistration">Password:</label>
      <input class="inputRegistration" type="password" id="password" name="password" required>
      
      
      
      <div class="buttonContainer">
        <input class="inputRegistration" type="submit" value="Login">
      </div>
    </form>
    
</body>


<?php
include './footer.inc';
?>