<?php

// Include settings.php to access database connection settings
session_start();

if (isset($_POST['submit_eoi_form'])) {
    eoi_form_submission();
}

if (isset($_POST['submit_delete_record'])) {
    delete_specified_row();
}

if (isset($_POST['submit_change_status'])) {
    submit_change_status();
}

if (isset($_POST['register'])) {
    register();
}

if (isset($_POST['login'])) {
    login();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'log_out') {
    logout();
}





function eoi_form_submission()
{
    session_start();
    require_once 'settings.php';

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the table already exists

        $query = "SHOW TABLES LIKE 'eoi'";
        $result = mysqli_query($conn, $query);
        $tableExists = mysqli_num_rows($result) > 0;

        if (!$tableExists) {
            // Table does not exist, create it
            $sql = "CREATE TABLE eoi (
            EOInumber int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            job_reference char(5) DEFAULT NULL,
            first_name varchar(20) DEFAULT NULL,
            last_name varchar(20) DEFAULT NULL,
            date_of_birth date DEFAULT NULL,
            gender enum('Male','Female','Other') DEFAULT NULL,
            street_address varchar(40) DEFAULT NULL,
            suburb_town varchar(40) DEFAULT NULL,
            state enum('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') DEFAULT NULL,
            postcode char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
            email varchar(50) DEFAULT NULL,
            phone varchar(12) DEFAULT NULL,
            skills varchar(255) DEFAULT NULL,
            other_skills varchar(255) DEFAULT NULL,
            status enum('New','Current','Final') DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";
        }

        if ($_POST['gender'] == 'male') {
            $gen = 'male';
        } else if ($_POST['gender'] == 'female') {
            $gen = 'female';
        } else {
            $gen = null;
        }

        $html_css = isset($_POST['skill1']) ? 'HTML/CSS,' : '';
        $javascript = isset($_POST['skill2']) ? 'JavaScript,' : '';
        $python = isset($_POST['skill3']) ? 'Python,' : '';
        $java = isset($_POST['skill4']) ? 'Programming Java,' : '';
        $c_plus = isset($_POST['skill5']) ? 'Programming C+,' : '';
        $sql = isset($_POST['skill6']) ? 'SQL,' : '';
        $mongodb = isset($_POST['skill7']) ? 'MongoDB,' : '';
        $other = isset($_POST['other']) ? $_POST['Other'] : '';

        // concatenate all the checkbox values into a single string
        $all_skills = $html_css . $javascript . $python . $java . $c_plus . $sql . $mongodb . $other;


        // If there are no validation errors, insert the form data into the database
        // if (count($errors) === 0) {
        $refNumber = mysqli_real_escape_string($conn, $_POST['refNumber']);
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $dateofbirth = mysqli_real_escape_string($conn, $_POST['dateofbirth']);
        $gender = mysqli_real_escape_string($conn, $gen);
        $street_address = mysqli_real_escape_string($conn, $_POST['street_address']);
        $suburb_town = mysqli_real_escape_string($conn, $_POST['suburb_town']);
        $states = mysqli_real_escape_string($conn, $_POST['states']);
        $postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);
        $pnumber = mysqli_real_escape_string($conn, $_POST['pnumber']);
        $skills = mysqli_real_escape_string($conn, $all_skills);
        $otherskills = mysqli_real_escape_string($conn, $_POST['otherskills']);

        $sql = "INSERT INTO eoi (job_reference, first_name, last_name, email, date_of_birth, gender, street_address, suburb_town, state , postcode, phone, skills ,other_skills, status) 
            VALUES ('$refNumber', '$firstname', '$lastname', '$email', '$dateofbirth', '$gender', '$street_address', '$suburb_town', '$states', '$postal_code', '$pnumber', '$skills' ,'$otherskills','New')";

        if (mysqli_query($conn, $sql)) {
            // Set session variable with success message
            $_SESSION['success_message'] = 'Record created successfully';
        } else {
            // Set session variable with success message
            $_SESSION['error_message'] = 'Error Occured,  Check whether data submitted or not';
        }

        header("Location: apply.php");
    }
}



function delete_specified_row()
{
    // Include settings.php to access database connection settings
    require_once 'settings.php';
    session_start();

    // Check if the form was submitted
    if (isset($_POST['reference'])) {

        // Get the EOInumber from the form input
        $reference = $_POST['reference'];

        // Construct the SQL query to delete the record based on the EOInumber
        $sql = "DELETE FROM eoi WHERE job_reference = '$reference'";

        // Execute the SQL query
        mysqli_query($conn, $sql);


        if (mysqli_query($conn, $sql)) {
            // Set session variable with success message
            $_SESSION['success_message'] = 'Record Deleted';
            header("Location: manage.php");
            exit();
        } else {
            // Set session variable with success message
            $_SESSION['error_message'] = 'Error Occured while deleting try again';
            header("Location: manage.php");
            exit();
        }

        // Redirect the user to another pag
    }
}


function submit_change_status()
{

    require_once 'settings.php';
    session_start();

    // Check if the form was submitted
    if (isset($_POST['reference']) && isset($_POST['change_status'])) {

        // Get the EOInumber from the form input
        $reference = $_POST['reference'];
        $status = $_POST['change_status'];

        // Construct the SQL query to delete the record based on the EOInumber
        $sql = "UPDATE eoi SET status = '$status' WHERE job_reference = '$reference'";

        // Execute the SQL query
        mysqli_query($conn, $sql);
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            // Set session variable with eror message
            $_SESSION['error_message'] = 'Error Occured while updating status';
        } else {
            // Set session variable with success message
            $_SESSION['success_message'] = 'Status Updated successfully';
        }

        // Redirect the user to another page
        header("Location: manage.php");
        exit();
    }
}

function register()
{

    require_once 'settings.php';
    session_start();

    // Check if the form was submitted
    $query = "SHOW TABLES LIKE 'registration'";
    $result = mysqli_query($conn, $query);
    $tableExists = mysqli_num_rows($result) > 0;

    if (!$tableExists) {
        $sql = "CREATE TABLE registration (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            role varchar(10) DEFAULT NULL,
            password VARCHAR(30) NOT NULL
        )";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["username_register"];
        $email = $_POST["email_register"];
        $password = $_POST["password"];
        $confirmPassword = $_POST['confirm-password'];

        if ($_POST['role'] == 'admin') {
            $role = 'admin';
        } else if ($_POST['role'] == 'user') {
            $role = 'user';
        } else {
            $role = null;
        }


        // Validate form data
        if ($password !== $confirmPassword) {
            $_SESSION['error_message'] = 'Passwords do not match. Please try again.';

            header('Location: registration.php');
            exit();
        }


        $sql = "INSERT INTO registration (name , email , role , password)
                VALUES ('$name', '$email', '$role' , '$password')";
    }

    if (!mysqli_query($conn, $sql)) {
        // Set session variable with success message
        $_SESSION['error_message'] = 'Error Occured while Register';
    }
    mysqli_close($conn);
    header('Location: login.php');
}

function login()
{

    require_once 'settings.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the submitted email and password
        $email = $_POST['email_login'];
        $password = $_POST['password_login'];

        // Construct a query to find the user with the specified email and password
        $sql = "SELECT * FROM registration WHERE email='$email' AND password='$password'";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if the query returned a row
        if (mysqli_num_rows($result) == 1) {
            // Authentication succeeded, start a new session and redirect to the dashboard
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['role'] == 'admin') {

                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $row['role'];
                    header('Location: manage.php');
                    exit();
                } elseif ($row['role'] == 'user') {

                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $row['role'];
                    header('Location: index.php');
                    exit();
                }
            }
        } else {
            // Authentication failed, display an error message
            $_SESSION['loginerror-message'] = 'Invalid Email or Password';
            header('Location: login.php');
        }

        mysqli_close($conn);
    }
}

function logout()
{
    session_start();
    session_unset();
    session_destroy();
}
