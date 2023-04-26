<?php

// Include settings.php to access database connection settings
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

    if ($_POST['gender'] == 'male') {
        $gen = 'male';
    } else if ($_POST['gender'] == 'female') {
        $gen = 'female';
    } else {
        $gen = null;
    }

    // If there are no validation errors, insert the form data into the database
    // if (count($errors) === 0) {
        $refNumber = mysqli_real_escape_string($conn, '1234');
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

        // if (mysqli_query($conn, $sql)) {
        //     echo "New record created successfully";
        // } else {
        //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        // }

        if (mysqli_query($conn, $sql)) {
            // Set session variable with success message
            $_SESSION['success_message'] = 'Record created successfully';

        } else {
           // Set session variable with success message
           $_SESSION['success_message'] = 'Error Occure Check whether data submitted or not';
        }

        header("Location: apply.php");
    // }
}
