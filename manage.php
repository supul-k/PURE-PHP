<?php
include './menu.inc';
require_once 'settings.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<body >
    <div class="mainContainer">
        <?php
        if (isset($_SESSION['success_message'])) {
            // Display success message and unset the session variable
            echo '<div class="success-message" style="padding: 10px;">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']);
        }

        if (isset($_SESSION['error_message'])) {
            // Display success message and unset the session variable
            // foreach ($_SESSION['error_messages'] as $error_message) {
            echo '<div class="error-message" style="padding: 10px;">' . $_SESSION['error_message'] . '</div>';
            // }
            unset($_SESSION['error_message']);
        }
        ?>

        <div class="headerContainer">
            <h3 >
                Filter Data by First Name, Last Name, or Both
            </h3>
        </div>
        <div class="upperMainContainer">
            <div class="formContainer">
                <form class="ManageForm" method="post" > 
                    <div id="firstname">
                        <label for="firstname">First Name</label><span id="fnameError" class="error"></span>
                        <input type="text" id="firstname" name="firstname" placeholder="First name" maxlength="30" size="25">
                    </div>

                    <div id="lastname" >
                        <label for="lastname">Last Name</label><span id="lnameError" class="error"></span>
                        <input type="text" id="lastname" name="lastname" placeholder="Last name" maxlength="25" size="25">
                    </div>
                    <div id="buttons">
                        <div >
                            <button type="submit" value="search_record" id="search_record" name="search_record">Search</button>
                        </div>
                    </div>
                    <div id="buttons">
                        <div>
                            <button type="submit" value="show_all" id="show_all" name="show_all">Show All</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="formContainer">
                <form class="ManageForm" method="post"  action="processEOI.php" id="change_status_form" novalidate="novalidate">
                    <div id="referenceNum" >

                        <label for="reference">Reference Number:</label>
                        <span id="referenceError" class="error"></span>
                        <input type="text" id="reference" name="reference" size="25">
                    </div>

                    <div id="changeStatus" >
                        <label for="change_status">Change Status of the application:</label>
                        <select id="change_status" name="change_status">
                            <option value="New">New</option>
                            <option value="Current">Current</option>
                            <option value="Final">Final</option>
                        </select>
                    </div>

                    <div id="buttons" >
                        <div >
                            <button type="submit" value="delete_record" id="reference_btn" name="submit_delete_record">Delete</button>
                        </div>
                    </div>
                    <div id="buttons">
                        <div>
                            <button type="submit" value="change_status" id="change_status_btn" name="submit_change_status">Change Status</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="tableContainer">
        <table id="table">
            <tr>
                <th>EOInumber</th>
                <th>job_reference</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>date_of_birth</th>
                <th>gender</th>
                <th>street_address</th>
                <th>suburb_town</th>
                <th>state</th>
                <th>postcode</th>
                <th>email</th>
                <th>phone</th>
                <th>other_skills</th>
                <th>status</th>
            </tr>
            <?php

            if (isset($_POST['search_record'])) {
                if (!empty($_POST['firstname']) && !empty($_POST['lastname'])) {

                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];

                    $sql = "SELECT * FROM eoi WHERE first_name = '$firstname' AND last_name = '$lastname' ";
                    $result = mysqli_query($conn, $sql);

                    if (!$result) {
                        $_SESSION['error_message'] = 'Please enter first name and lastname before click search button';
                    }
                } elseif (!empty($_POST['firstname'])) {

                    $firstname = $_POST['firstname'];

                    $sql = "SELECT * FROM eoi WHERE first_name = '$firstname' ";
                    $result = mysqli_query($conn, $sql);

                    if (!$result) {
                        $_SESSION['error_message'] = 'Please enter first name before click search button';
                    }
                } elseif (!empty($_POST['lastname'])) {

                    $lastname = $_POST['lastname'];

                    $sql = "SELECT * FROM eoi WHERE last_name = '$lastname' ";
                    $result = mysqli_query($conn, $sql);

                    if (!$result) {
                        $_SESSION['error_message'] = 'Please enter last name before click search button';
                    }
                } else {
                    if (!$result) {
                        $_SESSION['error_message'] = 'Please enter data into at least one of the fields.';
                    }
                }
            } elseif (isset($_POST['show_all'])) {

                $sql = 'SELECT * FROM eoi';
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die('Query failed: ' . mysqli_error($conn));
                }
            } else {
                $sql = 'SELECT * FROM eoi';
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die('Query failed: ' . mysqli_error($conn));
                }
            }

            // if (isset($_POST['show_all'])) {
            //     $sql = "SELECT * FROM eoi";
            //     $result = mysqli_query($conn, $sql);

            // }

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['EOInumber'] . '</td>';
                echo '<td>' . $row['job_reference'] . '</td>';
                echo '<td>' . $row['first_name'] . '</td>';
                echo '<td>' . $row['last_name'] . '</td>';
                echo '<td>' . $row['date_of_birth'] . '</td>';
                echo '<td>' . $row['gender'] . '</td>';
                echo '<td>' . $row['street_address'] . '</td>';
                echo '<td>' . $row['suburb_town'] . '</td>';
                echo '<td>' . $row['state'] . '</td>';
                echo '<td>' . $row['postcode'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td>' . $row['other_skills'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '</tr>';
            }

            // Close the database connection
            mysqli_close($conn);

            ?>

        </table>
        </div>

</body>

<?php
include './footer.inc';
?>