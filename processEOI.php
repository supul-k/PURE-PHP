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
// if (isset($_POST['search_record'])) {
//     search_record();
// }





function eoi_form_submission()
{
    session_start();
    require_once 'settings.php';

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Define validation rules
        // $validationRules = array(
        //     'refNumber' => 'required',
        //     'firstname' => 'required|alpha|max:30',
        //     'lastname' => 'required|alpha|max:25',
        //     'email' => 'required|email|max:40',
        //     'dateofbirth' => 'required|date',
        //     'gender' => 'required',
        //     'street_address' => 'required|max:50',
        //     'suburb_town' => 'required|max:50',
        //     'states' => 'required',
        //     'postal_code' => 'required|digits:4',
        //     'pnumber' => 'required|digits:10',
        //     'skills' => 'required'
        // );

        // // Define error messages
        // $errorMessages = array(
        //     'required' => 'This field is required',
        //     'alpha' => 'This field must contain only alphabetic characters',
        //     'email' => 'Please enter a valid email address',
        //     'date' => 'Please enter a valid date',
        //     'digits' => 'Please enter only digits'
        // );

        // //   Initialize an array to hold validation errors
        // $errors = array();

        // // Loop through each field and validate its value
        // foreach ($validationRules as $fieldName => $rules) {
        //     $fieldValue = $_POST[$fieldName];

        //     // Check if the field value is required and is empty
        //     if (strpos($rules, 'required') !== false && empty($fieldValue)) {
        //         $errors[$fieldName] = $errorMessages['required'];
        //     }

        //     // Check each validation rule and add an error message if the value is invalid
        //     $rulesArray = explode('|', $rules);
        //     foreach ($rulesArray as $rule) {
        //         switch ($rule) {
        //             case 'alpha':
        //                 if (!ctype_alpha($fieldValue)) {
        //                     $errors[$fieldName] = $errorMessages['alpha'];
        //                 }
        //                 break;
        //             case 'email':
        //                 if (!filter_var($fieldValue, FILTER_VALIDATE_EMAIL)) {
        //                     $errors[$fieldName] = $errorMessages['email'];
        //                 }
        //                 break;
        //             case 'date':
        //                 $dateArray = explode('-', $fieldValue);
        //                 if (count($dateArray) !== 3 || !checkdate($dateArray[1], $dateArray[2], $dateArray[0])) {
        //                     $errors[$fieldName] = $errorMessages['date'];
        //                 }
        //                 break;
        //             case 'digits':
        //                 if (!ctype_digit($fieldValue)) {
        //                     $errors[$fieldName] = $errorMessages['digits'];
        //                 }
        //                 break;
        //             case 'max':
        //                 $maxValue = intval(substr($rule, strpos($rule, ':') + 1));
        //                 if (strlen($fieldValue) > $maxValue) {
        //                     $errors[$fieldName] = "Please enter no more than {$maxValue} characters";
        //                 }
        //                 break;
        //             default:
        //                 break;
        //         }
        //     }
        // }

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
            other_skills varchar(255) DEFAULT NULL,
            status enum('New','Current','Final') DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";

            // Execute the CREATE TABLE query
            if (mysqli_query($conn, $sql)) {
                echo "Table created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }
        }

        if ($_POST['gender'] == 'male') {
            $gen = 'male';
        } else if ($_POST['gender'] == 'female') {
            $gen = 'female';
        } else {
            $gen = null;
        }

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
        $skills = mysqli_real_escape_string($conn, $_POST['skills']);

        $sql = "INSERT INTO eoi (job_reference, first_name, last_name, email, date_of_birth, gender, street_address, suburb_town, state , postcode, phone, other_skills) 
            VALUES ('$refNumber', '$firstname', '$lastname', '$email', '$dateofbirth', '$gender', '$street_address', '$suburb_town', '$states', '$postal_code', '$pnumber', '$skills')";

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
        } else {
            // Set session variable with success message
            $_SESSION['error_message'] = 'Error Occured while deleting try again';
        }

        // Redirect the user to another page
        header("Location: manage.php");
        exit();
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


        if (mysqli_query($conn, $sql)) {
            // Set session variable with success message
            $_SESSION['success_message'] = 'Status Updated successfully';
        } else {
            // Set session variable with success message
            $_SESSION['error_message'] = 'Error Occured while updating status';
        }

        // Redirect the user to another page
        header("Location: manage.php");
        exit();
    }
}

// function search_record()
// {

//     require_once 'settings.php';
//     session_start();


// if (isset($_POST['firstname']) && isset($_POST['lastname'])) {

//     $firstname = $_POST['firstname'];
//     $lastname = $_POST['lastname'];

//         // Construct the SQL query to delete the record based on the EOInumber
//         $sql = "SELECT * FROM `eoi` WHERE `first_name` = '$firstname' AND `last_name` = '$lastname';";

//         // Execute the SQL query
//         mysqli_query($conn, $sql);


//         if (mysqli_query($conn, $sql)) {
//             // Set session variable with success message
//             $_SESSION['success_message'] = 'Status Updated successfully';
//         } else {
//             // Set session variable with success message
//             $_SESSION['error_message'] = 'Error Occured while updating status';
//         }

//         // Redirect the user to another page
//         header("Location: manage.php");
//         exit();
//     }
// }

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
            password VARCHAR(30) NOT NULL
        )";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Table registration created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["email_register"];
        $email = $_POST["username_register"];
        $password = $_POST["password"];
        $confirmPassword = $_POST['confirm-password'];

        // Validate form data
        if ($password !== $confirmPassword) {
            $_SESSION['error_message'] = 'Passwords do not match. Please try again.';

            header('Location: registration.php');
            exit();
        }


        $sql = "INSERT INTO registration (name, email, password)
                VALUES ('$name', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "Registration successful";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);

    if (mysqli_query($conn, $sql)) {
        // Set session variable with success message
        $_SESSION['success_message'] = 'User Registered successfully';
    } else {
        // Set session variable with success message
        $_SESSION['error_message'] = 'Error Occured while Register';
    }

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
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    
        // Execute the query
        $result = mysqli_query($conn, $sql);
    
        // Check if the query returned a row
        if (mysqli_num_rows($result) == 1) {
            // Authentication succeeded, start a new session and redirect to the dashboard
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $email;
            header('Location: manage.php');
            exit();
        } else {
            // Authentication failed, display an error message
            $_SESSION['error_message'] = 'User Registered successfully';
        }
    }


    header('Location: login.php');
}
