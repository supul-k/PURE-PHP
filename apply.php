<?php
include './menu.inc';
?>

<body>
    <article>
        <div>
            <h1 id="heading1">Jobs Application</h1>
            <?php
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
            <p>You have <span id="timer">10:00</span> to complete the application.</p>

            <div class="container">
                <form id="regform" method="POST" action="processEOI.php" novalidate="novalidate">
                    <div id="refNumber">
                        <label for="job-ref">Job Reference Number:</label>
                        <span id="fnameError" class="error"></span>
                        <input type="text" id="refNumber" name="refNumber" placeholder="reference number">
                    </div>
                    <!-- <label for="refno">Job Reference No</label> <input type="text" id="refno" name="jobreferenceno" minlength="5" maxlength="5" size="5"  placeholder="Reference Number">  -->
                    <div id="firstname">
                        <label for="firstname">First Name</label><span id="fnameError" class="error"></span>
                        <input type="text" id="firstname" name="firstname" placeholder="First name" maxlength="20" size="20" required="required">
                    </div>

                    <div id="lastname">
                        <label for="lastname">Last Name</label><span id="lnameError" class="error"></span>
                        <input type="text" id="lastname" name="lastname" placeholder="Last name" maxlength="20" size="20" required="required">
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <span id="emailError" class="error"></span>
                        <input type="email" id="email" name="email" maxlength="40" size="40" placeholder="Your Email address" required="required">

                    </div>

                    <div id="dateofbirth">
                        <label for="dateofbirth">Date of Birth</label> <span id="bodError" class="error"></span>
                        <input type="date" id="dateofbirth" name="dateofbirth" value="2023-01-01" required="required">
                    </div>

                    <fieldset>
                        <legend>Gender</legend>
                        <label><input type="radio" id="male" name="gender" value="male" required="">Male</label>
                        <label><input type="radio" id="female" name="gender" value="female">Female</label> <br>
                        <span id="genderError" class="error"></span>
                    </fieldset>

                    <fieldset>
                        <legend>Address</legend>
                        <div class="control">
                            <label for="street address">Street address</label>
                            <span id="streetError" class="error"></span>
                            <input id="streetaddress" name="street_address" type="text" maxlength="50" size="50" required="required" placeholder="Street address">

                        </div>

                        <div class="control">
                            <label for="suburb">Suburb/town</label>
                            <span id="suburbError" class="error"></span>
                            <input id="suburb" name="suburb_town" type="text" placeholder="Suburb" maxlength="50" size="50" required="required">

                        </div>
                        <div class="control">
                            <p><label for="states">State</label>
                                <span id="stateError" class="error"></span>
                                <select name="states" id="states">
                                    <option value="none">Please Select</option>
                                    <option value="VIC">VIC</option>
                                    <option value="NSW">NSW</option>
                                    <option value="QLD">QLD</option>
                                    <option value="NT">NT</option>
                                    <option value="WA">WA</option>
                                    <option value="SA">SA</option>
                                    <option value="TAS">TAS</option>
                                    <option value="ACT">ACT</option>
                                </select>
                            </p>
                        </div>
                        <div class="control">
                            <label for="pcode">Postcode</label> <span id="pcodeError" class="error"></span>
                            <input type="number" id="pcode" name="postal_code" min="1000" max="9999" required="required">

                        </div>
                    </fieldset>

                    <div>
                        <label for="pnumber">Phone Number</label>
                        <span id="phoneError" class="error"></span>
                        <input type="text" id="pnumber" name="pnumber" pattern="^[0-9]*$" placeholder="Your Phone Number" maxlength="10" size="10" required="required"></p>
                    </div>

                    <fieldset>
                        <legend>Skills</legend> <span id="skillError" class="error"></span> <br>
                        <label for="skill1">HTML/CSS</label>
                        <input type="checkbox" name="skill1" id="skill1" value="HTML/CSS" required="required"> <label for="skill2">JavaScript</label> <input type="checkbox" name="skill2" id="skill2" value="JavaScript"> <label for="skill3">Python</label> <input type="checkbox" name="skill3" id="skill3" value="Python"> <label for="skill4">Programming Java</label> <input type="checkbox" name="skill4" id="skill4" value="Programming Java "> <label for="skill5">Programming C+</label> <input type="checkbox" name="skill5" id="skill5" value="Programming C+"> <label for="skill6">SQL</label> <input type="checkbox" name="skill6" id="skill6" value="SQL"> <label for="skill7">MongoDB</label> <input type="checkbox" name="skill7" id="skill7" value="MongoDB"> <label for="skill7">Other skills</label> <input type="checkbox" name="otherskills" id="otherskills" value="Other">
                    </fieldset>


                    <fieldset>
                        <label for="otherskill">Other Skills</label> <br>
                        <span id="otherskillError" class="error"></span>
                        <textarea id="otherskillstext" name="otherskills" placeholder="Write here your other skills" style="height:200px"></textarea>

                    </fieldset>
                    <div class="applyButtonContainer">
                    <input class="submitButton" type="submit" value="submit" id="submit" name="submit_eoi_form"> 
                    <input class="resetFormButton" type="reset" value="Reset Form">
                    </div>
                    
                </form>
            </div>
        </div>
    </article>
</body>



<?php
include './footer.inc';
?>