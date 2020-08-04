<div class="modal" id="modal-pay-balance">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Pay a Balance</p>
      <a class="delete" aria-label="close" id="pay-balance-close-btn"></a>
    </header>
    <section class="modal-card-body">
      <p style="visibility: hidden" class="has-text-danger has-text-centered" id="pay-balance-error-text">Invalid
        amount entered.</p>
      <br>
      <form action="profile" method="POST" onsubmit="return validateAmount();">
        <div class="field has-addons has-addons-centered">
          <p class="control">
            <span class="select">
              <select name="paymentMethodID" required>
                <?php
                if (isset($paymentMethods)) {
                  foreach ($paymentMethods as $index => $obj) {
                    echo "<option value=\"$obj->paymentMethodID\">$obj->paymentType: $obj->cardNumber</option>";
                  }
                }
                ?>
              </select>
            </span>
          </p>
          <p class="control">
            <input name="payBalanceAmount" class="input" type="number" min="0" placeholder="Amount" id="pay-balance-amount" required>
          </p>
          <p class="control">
            <button class="button is-info" type="submit" id="pay-balance-btn">
              Pay
            </button>
          </p>
        </div>
      </form>
    </section>
  </div>
</div>
<script type="text/javascript" src="templates/payBalance.js"></script>
