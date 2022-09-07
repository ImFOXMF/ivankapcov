<form
  action="<?= @$content['form-password-reset-email']['form-action'] ?>"
  method="post"
  class="e2-enterable"
>

<div class="form">

<?php if (@$content['form-password-reset-email']['reset-info']) { ?>
<div class="form-control">
  <div class="e2-text">
    <p><?= $content['form-password-reset-email']['reset-info'] ?></p>
  </div>
</div>
<?php } ?>

<?php if (@$content['form-password-reset-email']['show-controls?']) { ?>
<div class="form-control">
  <div class="form-label input-label"><label><?= _S ('ff--email') ?></label></div>
  <div class="form-element">
    <input type="text"
      class="text width-2"
      id="email"
      name="email"
      value=""
    />
  </div>
</div>

<div class="form-control">
  <div class="form-element">
  <button type="submit" id="submit-button" class="e2-button e2-submit-button">
    <?= @$content['form-password-reset-email']['submit-text'] ?>
  </button>
  </div>
</div>

<?php } ?>

</div>

</form>
