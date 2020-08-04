const newPassword = document.getElementById("new-password");
const confirmPassword = document.getElementById("confirm-password");
const passwordErrorText = document.getElementById("password-error-text");

function validatePassword() {
  if (newPassword.value != confirmPassword.value) {
    passwordErrorText.style.visibility = "visible";
    return false;
  } else {
    passwordErrorText.style.visibility = "hidden";
    return true;
  }
};
