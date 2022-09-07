<div
  class="
    e2-user-picture-container
    <?php if (!$content['blog']['userpic-set?']) { ?> e2-user-picture-container_empty<?php } ?>
    <?php if ($content['blog']['userpic-changeable?']) { ?> e2-external-drop-target<?php } ?>
  "
  <?php if ($content['blog']['userpic-changeable?']) { ?>
  data-href="<?= $content['blog']['userpic-upload-action']; ?>"
  title="<?= _S ('gs--drag-userpic-here') ?>"
  <?php } ?>
>
  <div class="e2-user-picture-inner">
    <?= _A (
      '<a href="'. $content['blog']['href']. '" class="nu e2-user-picture-container-link">
        <img
          src="'. ($content['blog']['userpic-set?'] ? $content['blog']['userpic-href'] : '') .'"
          class="e2-user-picture-image"
          alt=""
        />
        <div class="e2-user-picture-placeholder">
          '. _SVG ($content['blog']['userpic-changeable?'] ? 'userpic-placeholder' : 'userpic') .'
        </div>
      </a>')
    ?>
    <?php if (isset ($content['blog']['userpic-upload-action'])) { ?>
      <span class="e2-user-picture-spinner"><?= _SVG ('spin-progress') ?></span>
    <?php } ?>
  </div>
</div>
