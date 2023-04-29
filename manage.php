<?php
include './menu.inc';
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
        </tr>
        <?php

        $sql = 'SELECT * FROM eoi';
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die('Query failed: ' . mysqli_error($conn));
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
            echo '</tr>';
        }

        // Close the database connection
        mysqli_close($conn);

        ?>

    </table>
    </br>
    <form method="post" style="display: flex;  padding: 10px; justify-content: center;" action="processManage.php">
        <div >
            <label for="eoinumber">Reference Number:</label>
            <input style="padding: left 20px;" type="text" id="eoinumber" name="reference">
        </div>
        <div style="text-align: center;">
            <button  type="submit">Delete</button>
        </div>

    </form>
</body>

<?php
include '/var/www/html/assign2/footer.inc';
?>