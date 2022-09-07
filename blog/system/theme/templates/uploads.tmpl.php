<a id="e2-file-upload-action" href="<?= $content['uploads']['upload-action'] ?>"></a>
<a id="e2-file-remove-action" href="<?= $content['uploads']['remove-action'] ?>"></a>

<div id="e2-uploaded-image-prototype" class="e2-uploaded-image" style="display: none">
  <div class="e2-uploaded-image-inner e2-uploaded-image-inner_good">
    <img src="" alt="" />
  </div>
  <div class="e2-uploaded-image-inner e2-uploaded-image-inner_bad">
    <span class="e2-uploaded-image-noimage"></span>
  </div>

  <div class="e2-popup-menu e2-uploaded-image-popup-menu">
    <button type="button" class="e2-popup-menu-button">
      <span class="e2-popup-menu-button-text"><?= _S ('ab--menu-actions') ?></span>
    </button>

    <div class="e2-popup-menu-widget">
      <div class="e2-popup-menu-widget-item e2-popup-menu-widget-item_info" data-e2-popup-menu-action="do-not-close-popup-menu">
        <span class="e2-popup-menu-widget-item-text">
          <span class="e2-popup-menu-widget-item-text-row e2-image-popup-menu-filename"></span>
          <span class="e2-popup-menu-widget-item-text-row e2-image-popup-menu-filesize"></span>
        </span>
      </div>

      <hr class="e2-popup-menu-widget-separator">

      <button type="button" class="e2-popup-menu-widget-item e2-popup-menu-widget-item_remove" data-e2-js-action="remove-image">
        <span class="e2-popup-menu-widget-item-icon">
          <span class="e2-toggle-state-off"><span class="e2-svgi"><?= _SVG ('trash') ?></span></span>
          <span class="e2-toggle-state-thinking"><span class="e2-svgi"><?= _SVG ('spin') ?></span></span>
        </span>
        <span class="e2-popup-menu-widget-item-text"><?= _S ('mi--delete') ?></span>
      </button>

      <button type="button" class="e2-popup-menu-widget-item" data-e2-js-action="paste-image">
        <span class="e2-popup-menu-widget-item-icon"><span class="e2-svgi"><?= _SVG ('insert') ?></span></span>
        <span class="e2-popup-menu-widget-item-text"><?= _S ('mi--insert') ?></span>
      </button>
    </div>
  </div>
</div>

<div class="e2-uploaded-images">
  <?php foreach ($content['uploads']['each'] as $image) { ?>
    <div class="e2-uploaded-image">
      <?php if ($image['is-available?']) { ?>
        <div class="e2-uploaded-image-inner e2-uploaded-image-inner_good">
            <img
              src="<?= $image['src'] ?>"
              alt="<?= $image['original-filename'] ?>"
              width="<?= $image['width'] ?>"
              height="<?= $image['height'] ?>"
              data-filename="<?= $image['original-filename'] ?>"
              data-filesize="<?= $image['original-filesize'] ?>"
            />
        </div>
      <?php } else { ?>
        <div class="e2-uploaded-image-inner e2-uploaded-image-inner_bad">
          <span class="e2-uploaded-image-noimage" data-src="<?= $image['src'] ?>" data-filename="<?= $image['original-filename'] ?>"></span>
        </div>
      <?php } ?>
    </div>
  <?php } ?>
</div>


<?php if (@$content['uploads']['enabled?']) { ?>
  <div class="e2-upload-controls e2-upload-controls_hidden" data-e2-filename-prefix="<?= $content['uploads']['default-name']?>">
    <div class="e2-admin-link e2-upload-controls-attach">
      <span class="e2-admin-item e2-upload-controls-attach-icon">
        <span class="e2-admin-item-icon">
          <span class="e2-svgi"><?= _SVG ('attach') ?></span>
        </span>
        <span class="e2-admin-item-text"><?= _S ('mi--upload-file') ?></span>
      </span>
      <label for="e2-upload-button" class="e2-upload-controls-attach-label">
        <input type="file" multiple="multiple" class="e2-upload-controls-attach-input" id="e2-upload-button"/>
      </label>
    </div>
    <div class="e2-upload-controls-uploading e2-upload-controls-uploading_hidden">
      <span class="e2-svgi e2-svgi_40"><?= _SVG ('spin-progress') ?></span>
    </div>
  </div>
<?php } ?>

