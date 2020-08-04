const payBalanceErrorText = document.getElementById("pay-balance-error-text");
const payBalanceAmount = document.getElementById("pay-balance-amount");

function validateAmount() {
  if (!Number.isInteger(+payBalanceAmount.value)) {
    payBalanceErrorText.style.visibility = "visible";
    return false;
  }
  if (+payBalanceAmount.value < 1) {
    payBalanceErrorText.style.visibility = "visible";
    return false;
  }
  payBalanceErrorText.style.visibility = "hidden";
  return true;
};
