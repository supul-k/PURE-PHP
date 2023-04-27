<?php

// Include settings.php to access database connection settings
require_once 'settings.php';
session_start(); 

// Check if the form was submitted
if (isset($_POST['reference'])) {

    // Get the EOInumber from the form input
    $reference = $_POST['reference'];
  
    // Construct the SQL query to delete the record based on the EOInumber
    $sql = "DELETE * FROM eoi WHERE EOInumber = '$eoinumber'";
  
    // Execute the SQL query
    mysqli_query($conn, $sql);


    if (mysqli_query($conn, $sql)) {
        // Set session variable with success message
        $_SESSION['success_message'] = 'Record Deleted';
    } else {
        // Set session variable with success message
        $_SESSION['error_message'] = 'Error Occured while deleting try again';
    }
  
    // Redirect the user to another page
    header("Location: manage.php");
    exit();
  
  }

?>