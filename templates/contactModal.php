<a class="button is-small is-info" id="contact-btn-<?php echo "$obj->jobID"; ?>">Contact</a>
<div class="modal" id="modal-contact-<?php echo "$obj->jobID"; ?>">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Employer Contact Information</p>
      <button class="delete" aria-label="close" id="modal-contact-close-btn-<?php echo "$obj->jobID"; ?>"></button>
    </header>
    <section class="modal-card-body">
      <p class="is-size-2"><?php echo "$obj->companyName"; ?></p>
      <p class="is-size-6"><?php echo "$obj->categoryName"; ?></p>
      <p class="is-size-3"><?php echo "$obj->firstName ";
                            echo "$obj->lastName"; ?></p>
      <p class="is-size-4">@<?php echo "$obj->userID"; ?></p>
      <p class="is-size-5"><?php echo "$obj->phoneNumber"; ?></p>
      <p class="is-size-6"><?php echo "$obj->email"; ?></p>
    </section>
  </div>
</div>
<script type="text/javascript">
  const modalButton<?php echo "$obj->jobID"; ?> = document.getElementById("contact-btn-<?php echo "$obj->jobID"; ?>");
  const modal<?php echo "$obj->jobID"; ?> = document.getElementById("modal-contact-<?php echo "$obj->jobID"; ?>");
  const modalCloseButton<?php echo "$obj->jobID"; ?> = document.getElementById("modal-contact-close-btn-<?php echo "$obj->jobID"; ?>");

  modalButton<?php echo "$obj->jobID"; ?>.addEventListener("click", function() {
    modal<?php echo "$obj->jobID"; ?>.className = "modal is-active";
  })

  if (modalCloseButton<?php echo "$obj->jobID"; ?>) {
    modalCloseButton<?php echo "$obj->jobID"; ?>.addEventListener("click", function() {
      modal<?php echo "$obj->jobID"; ?>.className = "modal";
    })
  }
</script>
