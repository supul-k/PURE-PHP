<?php
include '/var/www/html/assign2/menu.inc';
require_once 'settings.php';
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
    <div style="display: flex; justify-content: space-evenly;">
        <div style="max-width: 400px; ">
            <form method="post" style="padding: 10px; text-align: center;" >
                <div id="firstname">
                    <label for="firstname">First Name</label><span id="fnameError" class="error"></span>
                    <input type="text" id="firstname" name="firstname" placeholder="First name" maxlength="30" size="30" >
                </div>

                <div id="lastname">
                    <label for="lastname">Last Name</label><span id="lnameError" class="error"></span>
                    <input type="text" id="lastname" name="lastname" placeholder="Last name" maxlength="25" size="25" >
                </div>
                <div id="buttons" style="padding: 10px;">
                    <div style="text-align: center; padding-bottom: 10px;">
                        <button type="submit" value="search_record" id="search_record" name="search_record">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div style="max-width: 400px; ">
            <form method="post" style="padding: 10px; text-align: center;" action="processEOI.php">
                <div>
                    <div>

                        <label for="reference">Reference Number:</label>
                        <input style="padding: left 20px;" type="text" id="reference" name="reference">
                    </div>


                </div>

                <div>
                    <div>
                        <label for="change_status">Change Status of the application:</label>
                        <select id="change_status" name="change_status">
                            <option value="New">New</option>
                            <option value="Current">Current</option>
                            <option value="Final">Final</option>
                        </select>
                    </div>


                </div>
                <div id="buttons" style="padding: 10px;">
                    <div style="text-align: center; padding-bottom: 10px;">
                        <button type="submit" value="delete_record" id="reference_btn" name="submit_delete_record">Delete</button>
                    </div>
                    <div style="text-align: center;">
                        <button type="submit" value="change_status" id="change_status_btn" name="submit_change_status">Change Status</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                // if (!empty($_POST['lastname'])) {
                //     // Do something if the lastname field is not empty
                // } else {
                //     // Do something if the lastname field is empty
                // }
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];

                echo($firstname . '----'. $lastname );

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
        } else {

            $sql = 'SELECT * FROM eoi';
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die('Query failed: ' . mysqli_error($conn));
            }
        }

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

</body>

<?php
include '/var/www/html/assign2/footer.inc';
?>