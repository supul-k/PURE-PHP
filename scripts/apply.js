window.onload = function () {
  setJobRefNumber();
  init();
};

function init() {
  "use strict";
  var regForm = document.getElementById("regform"); // get ref to the HTML element
  regForm.onsubmit = validate; //register the event listener
}

function validate() {
  var errMsg = "Error Message : \n";
  var result = true;

  var firstname = document.getElementById("firstname").value;
  var lastname = document.getElementById("lastname").value;
  var state = document.getElementById("states").value;
  var postcode = document.getElementById("pcode").value;
  var dob = document.getElementById("dateofbirth").value;
  var email = document.getElementById("email").value;
  var pnumber = document.getElementById("pnumber").value;

  console.log(pnumber);

  if (!firstname.match(/^[a-zA-Z]+$/)) {
    document.getElementById("fnameError").innerHTML =
      "You must enter valid first name";
  } else if (firstname.match(/^[a-zA-Z]+$/)) {
    document.getElementById("fnameError").innerHTML = "";
  }

  if (!lastname.match(/^[a-zA-Z]+$/)) {
    document.getElementById("lnameError").innerHTML =
      "You must enter valid last name";
    result = false;
  }
  if (lastname.match(/^[a-zA-Z]+$/)) {
    document.getElementById("lnameError").innerHTML = "";
    result = false;
  }

  // Validate email
  if (!email.match(/^\S+@\S+\.\S+$/) || document.getElementById("email").value == "") {
    document.getElementById("emailError").innerHTML =
      "You must enter a valid email address";
    result = false;
  } else {
    document.getElementById("emailError").innerHTML = "";
  }

  // Validate dob
  if (!dob.match(/^\d{4}-\d{2}-\d{2}$/)) {
    document.getElementById("bodError").innerHTML =
      "You must enter a valid date in YYYY-MM-DD format";
    result = false;
  } else {
    document.getElementById("bodError").innerHTML = "";
  }

  // Validate phone number
  if (!pnumber.match(/^\d{10}$/) || document.getElementById("pnumber").value == "") {
    document.getElementById("phoneError").innerHTML =
      "You must enter a valid 10-digit phone number";
    result = false;
  } else {
    document.getElementById("phoneError").innerHTML = "";
  }

  if (document.getElementById("streetaddress").value == "") {
    document.getElementById("streetError").innerHTML =
      "You must enter valid street address";
    result = false;
  } else if (document.getElementById("streetaddress").value != "") {
    document.getElementById("streetError").innerHTML = "";
    result = false;
  }

  if (document.getElementById("suburb").value == "") {
    document.getElementById("suburbError").innerHTML =
      "You must enter valid suburb";
    result = false;
  } else if (document.getElementById("suburb").value != "") {
    document.getElementById("suburbError").innerHTML = "";
    result = false;
  }

  if (document.getElementById("states").value == "none") {
    document.getElementById("stateError").innerHTML =
      "You must select your state";
    result = false;
  }
  if (document.getElementById("states").value != "none") {
    document.getElementById("stateError").innerHTML = "";
    result = false;
  }
  //Matching the first digit of the postcode according to the selected State
  //VIC = 3 OR 8, NSW = 1 OR 2, QLD = 4 OR 9, NT = 0, WA = 6, SA=5, TAS=7, ACT= 0.
  if (postcode.charAt(0) == 3 && state == "VIC") {
  } else if (postcode.charAt(0) == 8 && state == "VIC") {
    document.getElementById("pcodeError").innerHTML = "";
  } else if (postcode.charAt(0) == 1 && state == "NSW") {
    document.getElementById("pcodeError").innerHTML = "";
  } else if (postcode.charAt(0) == 2 && state == "NSW") {
    document.getElementById("pcodeError").innerHTML = "";
  } else if (postcode.charAt(0) == 4 && state == "QLD") {
    document.getElementById("pcodeError").innerHTML = "";
  } else if (postcode.charAt(0) == 9 && state == "QLD") {
    document.getElementById("pcodeError").innerHTML = "";
  } else if (postcode.charAt(0) == 0 && state == "NT") {
    document.getElementById("pcodeError").innerHTML = "";
  } else if (postcode.charAt(0) == 6 && state == "WA") {
    document.getElementById("pcodeError").innerHTML = "";
  } else if (postcode.charAt(0) == 5 && state == "SA") {
    document.getElementById("pcodeError").innerHTML = "";
  } else if (postcode.charAt(0) == 7 && state == "TAS") {
    document.getElementById("pcodeError").innerHTML = "";
  } else if (postcode.charAt(0) == 0 && state == "ACT") {
    document.getElementById("pcodeError").innerHTML = "";
  } else {
    document.getElementById("pcodeError").innerHTML = "Postcode incorrect";
    result = false;
  }

  var otherSkillsCheckbox = document.getElementById("otherskills").checked;
  var otherSkillsTextarea = document.getElementById("otherskillstext");
  var otherskilltexted = document.getElementById("otherskillstext").value;

  if (otherSkillsCheckbox && otherskilltexted == "") {
    document.getElementById("otherskillError").innerHTML =
      "You must enter your other skills";
    result = false;
  } else if (otherSkillsCheckbox && otherskilltexted != "") {
    document.getElementById("otherskillError").innerHTML = "";
    result = false;
  }

  var male = document.getElementById("male").checked;
  var female = document.getElementById("female").checked;

  var email = document.getElementById("email").value;
  var phone = document.getElementById("pnumber").value;
  var htmlcss = document.getElementById("skill1").checked;
  var javascript = document.getElementById("skill2").checked;
  var python = document.getElementById("skill3").checked;
  var programmingjava = document.getElementById("skill4").checked;
  var programmingc = document.getElementById("skill5").checked;
  var sql = document.getElementById("skill6").checked;
  var mongodb = document.getElementById("skill7").checked;

  if (
    htmlcss ||
    javascript ||
    python ||
    programmingjava ||
    programmingc ||
    sql ||
    mongodb ||
    otherSkillsCheckbox
  ) {
    document.getElementById("skillError").innerHTML = "";
    result = false;
  } else {
    document.getElementById("skillError").innerHTML =
      "Please select at least one skill";
  }

  if (male || female) {
    document.getElementById("genderError").innerHTML = "";
    result = false;
  } else {
    document.getElementById("genderError").innerHTML =
      "Please select your gender";
  }

  var dob = document.getElementById("dateofbirth").value;
  var dobRegex =
    /(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})/;
  var age = calculateAge(dob);

  if (!dobRegex.test(dob)) {
    document.getElementById("bodError").innerHTML = "";
    //alert("Please enter a valid date of birth in dd/mm/yyyy format.");
    return false;
  } else if (dobRegex.test(dob)) {
    document.getElementById("bodError").innerHTML =
      "Please enter a valid date of birth in dd/mm/yyyy format";
    //alert("Please enter a valid date of birth in dd/mm/yyyy format.");
    return false;
  }

  if (age < 15 || age > 80) {
    document.getElementById("bodError").innerHTML =
      "you must be in 15-80 age for this form";
    return false;
  }
  return result;
}

function calculateAge(dob) {
  var today = new Date();
  var birthDate = new Date(dob);
  var age = today.getFullYear() - birthDate.getFullYear();
  var m = today.getMonth() - birthDate.getMonth();

  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }

  return age;
}

function setJobRefNumber() {
  // Get job reference number from URL query parameter
  const urlParams = new URLSearchParams(window.location.search);
  const refNumber = urlParams.get("refNumber");
  console.log(refNumber); // Add this line to print the value of refNumber

  // Set job reference number as value of job reference field
  document.getElementById("refNumber").value = refNumber;
  console.log("JavaScript file loaded");
}
