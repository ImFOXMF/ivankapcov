<form
  action="<?= @$content['form-password']['form-action'] ?>"
  method="post"
  class="e2-enterable"
>

<div class="form">

<input
  type="hidden"
  id="recovery-key"
  name="recovery-key"
  value="<?=@$content['form-password']['.recovery-key']?>"
/>

<?php if (!$content['form-password']['recovering?']) { ?>
<div class="form-control">
  <div class="form-label input-label"><label><?= _S ('ff--old-password') ?></label></div>
  <div class="form-element">
    <input type="password"
      class="text required width-2"
      autofocus="autofocus"
      id="old-password"
      name="old-password"
      value=""
    />
  </div>
</div>
<?php } ?>

<div class="form-control">
  <div class="form-label input-label"><label><?= _S ('ff--new-password') ?></label></div>
  <div class="form-element">
    <input type="text"
      class="text required width-2"
      id="new-password"
      <?php if ($content['form-password']['recovering?']) { ?>
      autofocus="autofocus"
      <?php } ?>
      name="new-password"
      value=""
    />
    <div class="form-control-sublabel">
      <?= _S ('ff--displayed-as-plain-text') ?>
    </div>
  </div>
</div>


<div class="form-control">
  <div class="form-element">
  <button type="submit" id="submit-button" class="e2-button e2-submit-button">
    <?= @$content['form-password']['submit-text'] ?>
  </button>
  </div>
</div>

</div>

</form>
