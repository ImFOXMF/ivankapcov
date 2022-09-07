<form
  action="<?= @$content['form-note-delete']['form-action'] ?>"
  method="post"
  id="form-note-delete"
>

<input
  type="hidden"
  id="note-id"
  name="note-id"
  value="<?= @$content['form-note-delete']['.note-id'] ?>"
/>

<input
  type="hidden"
  id="is-draft"
  name="is-draft"
  value="<?= @$content['form-note-delete']['.is-draft'] ?>"
/>

<div class="form">

<div class="form-control delete-box">
  <div class="form-element e2-text">
    <p><?= @$content['form-note-delete']['caution-text'] ?></p>
  </div>
  <div class="form-element">
    <button type="submit" id="submit-button" class="e2-button e2-delete-button">
      <?= @$content['form-note-delete']['submit-text'] ?>
    </button>
  </div>
</div>

</div>

</form>



<?php if (array_key_exists ('hide-href', $content['form-note-delete']) or array_key_exists ('withdraw-href', $content['form-note-delete'])) { ?>

<div class="form">

<?php if (array_key_exists ('hide-href', $content['form-note-delete'])) { ?>
<div class="form-control">
  <div class="form-element">
    <form action="<?= $content['form-note-delete']['hide-href'] ?>" method="post"><button type="submit" class="e2-button"><?= _S ('fb--hide') ?></button></form>
    <div class="form-control-sublabel">
    <?= _S ('gs--post-will-be-hidden') ?>
    </div>
  </div>
</div>
<?php } ?>



<?php if (array_key_exists ('withdraw-href', $content['form-note-delete'])) { ?>
<div class="form-control">
  <div class="form-element">
    <form action="<?= $content['form-note-delete']['withdraw-href'] ?>" method="post"><button type="submit" class="e2-button"><?= _S ('fb--withdraw') ?></button></form>
    <div class="form-control-sublabel">
    <?= _S ('gs--post-will-be-withdrawn') ?>
    </div>
  </div>
</div>
<?php } ?>

</div>

<?php } ?>