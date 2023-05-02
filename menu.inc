<?php
include './header.inc';
?>

<script>
  window.addEventListener('load', function() {
    document.getElementById("logoutBtn").addEventListener("click", function() {
      // send a request to the server to log out the user
      console.log('hi');
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "processEOI.php");
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("action=" + this.getAttribute("data-action"));

      // redirect the user to the login page
      window.location.href = "login.php";
    });
  });
</script>

<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
?>
  <nav style="display: flex; justify-content: space-between;">
    <ul>
      <li>
        <a href="manage.php">Manage</a>
      </li>
      <li>
        <a href="index.php">Home</a>
      </li>
      <li>
        <a href="jobs.php">Jobs</a>
      </li>
      <li>
        <a href="about.php">About Me</a>
      </li>
      <li>
        <a href="enhancements1.php">Enhancements 1</a>
      </li>
      <li>
        <a href="enhancements2.php">Enhancements 2</a>
      </li>
      <li>
        <a href="enhancements3.php">Enhancements 3</a>
      </li>
    </ul>
    <ul>
      <li>
        <a href="#" data-action="log_out" id="logoutBtn">Log out</a>
      </li>
    </ul>
  </nav>
<?php
}
?>

<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 'user') {
?>
  <nav style="display: flex;
    justify-content: space-between;">
    <ul>
      <li>
        <a href="index.php">Home</a>
      </li>
      <li>
        <a href="jobs.php">Jobs</a>
      </li>
      <li>
        <a href="apply.php">Job Application</a>
      </li>
      <li>
        <a href="about.php">About Me</a>
      </li>
      <li>
        <a href="enhancements1.php">Enhancements 1</a>
      </li>
      <li>
        <a href="enhancements2.php">Enhancements 2</a>
      </li>
      <li>
        <a href="enhancements3.php">Enhancements 3</a>
      </li>
    </ul>
    <ul>
      <li>
        <a href="#" data-action="log_out" id="logoutBtn">Log out</a>
      </li>
    </ul>

  </nav>
<?php
}
?>