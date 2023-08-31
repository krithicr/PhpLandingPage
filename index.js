const Name = document.getElementById("name");
const email = document.getElementById("email");
const contact = document.getElementById("contact");
const button = document.getElementById("submit");
const form = document.getElementById("form");
// const nameError = document.getElementById("alert_name");
// const emailError = document.getElementById("alert_email");
// const contactError = document.getElementById("alert_contact");

form.addEventListener("submit", () => {
  validateForm();
});

function validateForm() {
  let nameError = "";
  let emailError = "";
  let contactError = "";

  if (Name.value == "") {
    nameError = "*Name is required";
  } else {
    nameError = "";
  }

  if (email.value == "") {
    emailError = "*Email is required";
  } else if (!validateEmail(email.value)) {
    emailError = "*Enter a valid Email";
  } else {
    emailError = "";
  }

  if (contact.value == "") {
    contactError = "*Contact number is required";
  } else if (isNaN(contact.value)) {
    contactError = "*Enter a valid contact number";
  } else {
    contactError = "";
  }

  document.getElementById("alert_name").innerHTML = nameError;
  document.getElementById("alert_email").innerHTML = emailError;
  document.getElementById("alert_contact").innerHTML = contactError;

  if (nameError == "" && emailError == "" && contactError == "") {
    return true;
  } else {
    return false;
  }
}

function validateEmail(element) {
  return String(element)
    .toLowerCase()
    .match(/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/);
}
