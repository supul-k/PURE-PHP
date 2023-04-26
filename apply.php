<?php
include '/var/www/html/assign2/menu.inc';
?>

<body>
    <article>
        <div>
            <h1 id="heading1">Jobs Application</h1>
            <p>You have <span id="timer">10:00</span> to complete the application.</p>

            <div class="container">
                <form id="regform" method="post" action="https://mercury.swin.edu.au/it000000/formtest.php" novalidate="novalidate">
                    <div id="refNumber">
                        <label for="job-ref">Job Reference Number:</label>
                        <input type="text" id="refNumber" name="refNumber" readonly>
                    </div>
                    <!-- <label for="refno">Job Reference No</label> <input type="text" id="refno" name="jobreferenceno" minlength="5" maxlength="5" size="5"  placeholder="Reference Number">  -->
                    <div id="firstname">
                        <label for="firstname">First Name</label><span id="fnameError" class="error"></span>
                        <input type="text" id="firstname" name="firstname" placeholder="First name" maxlength="30" size="30" required="required">
                    </div>

                    <div id="lastname">
                        <label for="lastname">Last Name</label><span id="lnameError" class="error"></span>
                        <input type="text" id="lastname" name="lastname" placeholder="Last name" maxlength="25" size="25" required="required">
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
                            <label for="street address">Street address</label> <span id="streetError" class="error"></span> <input id="streetaddress" type="text" maxlength="50" size="50" required="required" placeholder="Street address">

                        </div>

                        <div class="control">
                            <label for="suburb">Suburb/town</label> <span id="suburbError" class="error"></span> <input id="suburb" type="text" placeholder="Suburb" maxlength="50" size="50" required="required">

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
                            <label for="pcode">Postcode</label> <span id="pcodeError" class="error"></span> <br> <input type="number" id="pcode" name="postal_code" min="1000" max="9999" required="required">

                        </div>
                    </fieldset><label for="email">Email</label> <span id="emailError" class="error"></span> <input type="email" id="email" name="email" maxlength="40" size="40" placeholder="Your Email address" required="required">

                    <p><label for="pnumber">Phone Number</label> <span id="phoneError" class="error"></span> <input type="text" id="pnumber" name="pnumber" pattern="^[0-9]*$" placeholder="Your Phone Number" maxlength="10" size="10" required="required"></p>

                    <fieldset>
                        <legend>Skills</legend> <span id="skillError" class="error"></span> <br>
                        <label for="skill1">HTML/CSS</label> <input type="checkbox" name="skill1" id="skill1" value="HTML/CSS" required="required"> <label for="skill2">JavaScript</label> <input type="checkbox" name="skill2" id="skill2" value="JavaScript"> <label for="skill3">Python</label> <input type="checkbox" name="skill3" id="skill3" value="Python"> <label for="skill4">Programming Java</label> <input type="checkbox" name="skill4" id="skill4" value="Programming Java "> <label for="skill5">Programming C+</label> <input type="checkbox" name="skill5" id="skill5" value="Programming C+"> <label for="skill6">SQL</label> <input type="checkbox" name="skill6" id="skill6" value="SQL"> <label for="skill7">MongoDB</label> <input type="checkbox" name="skill7" id="skill7" value="MongoDB"> <label for="skill7">Other skills</label> <input type="checkbox" name="otherskills" id="otherskills" value="Other">
                    </fieldset>


                    <fieldset>
                        <label for="otherskill">Other Skills</label> <br>
                        <span id="otherskillError" class="error"></span>
                        <textarea id="otherskillstext" name="otherskills" placeholder="Write here your other skills" style="height:200px"></textarea>

                    </fieldset>
                    <input type="submit" value="Submit" id="submit"> <input type="reset" value="Reset Form">
                </form>
            </div>
        </div>
    </article>
</body>



<?php
include '/var/www/html/assign2/footer.inc';
?>