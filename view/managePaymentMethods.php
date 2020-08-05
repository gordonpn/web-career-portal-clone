<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Manage Payment Methods</title>
</head>

<body>
  <?php
  $heroTitle = "Manage Payment Methods";
  require "templates/hero.php";
  ?>
  <section class="section">
    <div class="container">
      <?php if (isset($error)) : ?>
        <p class="has-text-weight-bold has-text-danger">
          <?php echo $error; ?>
        </p>
      <?php endif; ?>
      <?php if (isset($message)) : ?>
        <p class="has-text-weight-bold has-text-info">
          <?php echo $message; ?>
        </p>
      <?php endif; ?>
      <div class="buttons is-right">
        <?php if (isset($paymentMethods) && count($paymentMethods) > 1) : ?>
          <button class="button is-link is-outlined is-right" id="change-pre-selected-btn">Change Pre-Selected</button>
        <?php endif; ?>
        <button class="button is-link is-outlined is-right" id="add-payment-btn">Add Payment Method</button>
      </div>
      <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Card Number</th>
            <th>Payment Type</th>
            <th>Pre-Selected</th>
            <th></th>
            <?php if (isset($paymentMethods) && count($paymentMethods) > 1) : ?>
              <th></th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($paymentMethods)) {
            foreach ($paymentMethods as $index => $obj) {
              echo '<tr>';
              echo "<td>$obj->cardNumber</td>";
              echo "<td>$obj->paymentType</td>";
              if ($obj->isPreSelected) {
                echo "<td>True</td>";
              } else {
                echo "<td>False</td>";
              }
              echo '<td>';
              echo "<a class=\"button is-small is-info is-light\" href=\"managePaymentMethods?updatePaymentMethod=$obj->paymentMethodID\">";
              echo 'Edit';
              echo '</a>';
              echo '</td>';
              if (!$obj->isPreSelected && count($paymentMethods) > 1) {
                echo '<td>';
                echo "<a class=\"button is-small is-danger is-light\" href=\"managePaymentMethods?deletePaymentMethod=$obj->paymentMethodID\">";
                echo 'Delete';
                echo '</a>';
                echo '</td>';
              }
              echo '</tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
  <div class="modal" id="modal-change-preselected">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Change Pre-Selected Payment Method</p>
        <a class="delete" aria-label="close" id="change-pre-selected-close-btn"></a>
      </header>
      <section class="modal-card-body">
        <form action="managePaymentMethods" method="POST">
          <div class=" field has-addons has-addons-centered">
            <p class="control">
              <span class="select">
                <select name="updatePreSelected" required>
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
              <button class="button is-info" type="submit" id="select-pre-selected-btn">
                Select as Default
              </button>
            </p>
          </div>
        </form>
      </section>
    </div>
  </div>
  <div class="modal" id="modal-add">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Add Payment Method</p>
        <a class="delete" aria-label="close" id="add-method-close-btn"></a>
      </header>
      <section class="modal-card-body">
        <form action="managePaymentMethods" method="POST">
          <div class=" field has-addons has-addons-centered">
            <p class="control">
              <div class="select">
                <select name="newPaymentType" required>
                  <option value="Credit">Credit</option>
                  <option value="Debit">Debit</option>
                </select>
              </div>
            </p>
            <p class="control has-icons-left">
              <input name="newCardNumber" class="input" type="tel" inputmode="numeric" pattern="[0-9]{4,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" required>
              <span class="icon is-small is-left">
                <i class="far fa-credit-card"></i>
              </span>
            </p>
            <p class="control">
              <button class="button is-info" type="submit">
                Add Payment Method
              </button>
            </p>
          </div>
        </form>
      </section>
    </div>
  </div>
  <?php if (isset($paymentMethod)) : ?>
    <div class="modal is-active" id="modal-edit">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Edit Payment Method</p>
          <a class="delete" aria-label="close" id="edit-method-close-btn"></a>
        </header>
        <section class="modal-card-body">
          <form action="managePaymentMethods" method="POST">
            <div class=" field has-addons has-addons-centered">
              <p class="control">
                <div class="select">
                  <select name="updatePaymentType" required>
                    <option value="Credit">Credit</option>
                    <option value="Debit">Debit</option>
                  </select>
                </div>
              </p>
              <p class="control has-icons-left">
                <input name="updateCardNumber" class="input" type="tel" inputmode="numeric" pattern="[0-9]{4,19}" autocomplete="cc-number" maxlength="19" value="<?php echo $paymentMethod->cardNumber; ?>" placeholder="<?php echo $paymentMethod->cardNumber; ?>">
                <span class="icon is-small is-left">
                  <i class="far fa-credit-card"></i>
                </span>
              </p>
              <input type="hidden" name="updatePaymentMethodID" value="<?php echo $paymentMethod->paymentMethodID; ?>" />
              <p class="control">
                <button class="button is-info" type="submit">
                  Update Payment Method
                </button>
              </p>
            </div>
          </form>
        </section>
      </div>
    </div>
  <?php endif; ?>
  <script type="text/javascript">
    const changePreSelectedModal = document.getElementById("modal-change-preselected");
    const changePreSelectedCloseButton = document.getElementById("change-pre-selected-close-btn");
    const changePreSelectedButton = document.getElementById("change-pre-selected-btn");
    const addPaymentButton = document.getElementById("add-payment-btn");
    const addPaymentCloseButton = document.getElementById("add-method-close-btn");
    const addPaymentModal = document.getElementById("modal-add");
    const editPaymentCloseButton = document.getElementById("edit-method-close-btn");
    const editPaymentModal = document.getElementById("modal-edit");

    function closeModal() {
      changePreSelectedModal.className = "modal";
      addPaymentModal.className = "modal";
      editPaymentModal.className = "modal";
    }

    if (changePreSelectedButton) {
      changePreSelectedButton.addEventListener("click", function() {
        changePreSelectedModal.className = "modal is-active";
      });
    }
    if (changePreSelectedCloseButton) {
      changePreSelectedCloseButton.addEventListener('click', closeModal);
    }
    if (addPaymentButton) {
      addPaymentButton.addEventListener("click", function() {
        addPaymentModal.className = "modal is-active";
      });
    }
    if (addPaymentCloseButton) {
      addPaymentCloseButton.addEventListener('click', closeModal);
    }
    if (editPaymentCloseButton) {
      editPaymentCloseButton.addEventListener('click', closeModal);
    }
  </script>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
