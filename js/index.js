const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const email = document.getElementById("email");
const password = document.getElementById("password");
const submit = document.getElementById("submit");

firstName.addEventListener("blur", enterFirstName);
lastName.addEventListener("blur", enterLastName);
email.addEventListener("blur", enterEmail);
password.addEventListener("blur", enterPassword);
submit.addEventListener("click", submitForm);

function validation(reg, value, id) {
  if (reg.test(value)) {
    id.classList.add("is-valid");
    id.classList.remove("is-invalid");
  } else {
    id.classList.add("is-invalid");
    id.classList.remove("is-valid");
  }
}

function enterFirstName() {
  const reg = /^[a-zA-Z]([0-9a-zA-Z]){4,10}$/;
  let firstNameValue = firstName.value;
  validation(reg, firstNameValue, firstName);
}

function enterLastName() {
  const reg = /^[a-zA-Z]([0-9a-zA-Z]){4,10}$/;
  let lastNameValue = lastName.value;
  validation(reg, lastNameValue, lastName);
}

function enterEmail() {
  const reg = /^([0-9a-zA-Z]+)\@([0-9a-zA-Z]+)\.([a-zA-Z]){2,3}$/;
  let emailValue = email.value;
  validation(reg, emailValue, email);
}

function enterPassword() {
  const reg = /^[a-zA-Z]([0-9a-zA-Z])/;
  let passwordValue = password.value;
  validation(reg, passwordValue, password);
}

function submitForm(error) {
  error.preventDefault();
}
