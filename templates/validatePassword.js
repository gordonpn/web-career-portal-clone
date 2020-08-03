const newPassword = document.getElementById("new-password");
const confirmPassword = document.getElementById("confirm-password");
const errorText = document.getElementById("error-text");

function validatePassword() {
  if (newPassword.value != confirmPassword.value) {
    errorText.style.visibility = "visible";
    return false;
  } else {
    errorText.style.visibility = "hidden";
    return true;
  }
};
