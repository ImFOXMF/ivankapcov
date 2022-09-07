<?php $comment = $content['_']['_comment']; ?>
<?php unset ($content['_']['_comment']); ?>

<?php if ($comment['first-new?']) { ?><a name="new"></a><?php } ?>

<div class="e2-comment-and-reply">
  <div class="<?= $comment['spam-suspect?']? 'e2-spam' : '' ?>">
    <div class="e2-comment">

      <div class="e2-comment-userpic-area">
        <div class="e2-comment-userpic-area-inner">
          <?php if (!empty ($comment['name-href'])) { ?><a href="<?= $comment['name-href'] ?>" class="nu e2-comment-userpic-area-inner-link"><?php } ?>
            <?php if ($comment['userpic-set?']) { ?>
              <img src="<?= $comment['userpic-href'] ?>" class="e2-comment-userpic-area-inner__img" alt="" />
            <?php } else { ?>
              <div class="e2-comment-userpic-area-inner-placeholder"><?= _SVG ('userpic') ?></div>
            <?php } ?>
            <?php if (!empty ($comment['name-href'])) { ?></a><?php } ?>
        </div>
      </div>

      <div class="e2-comment-content-area"><span class="e2-comment-author e2-comment-piece-markable <?php if (@$comment['important?']) echo 'e2-comment-piece-marked' ?>"><?php if ($comment['gip-used?']) { ?><span class="e2-svgi e2-svgi-smaller"><?= _SVG ($comment['gip']) ?></span> <?php } ?><span><?= @$comment['name'] ?></span></span>
        <span class="e2-comment-date" title="<?=_DT ('j {month-g} Y, H:i, {zone}', @$comment['time'])?>">
      <?= _AGO ($comment['time']) ?>
    </span>

        <div class="e2-comment-content e2-text">
          <?=@$comment['text']?>
        </div>
      </div>

      <?php if (array_key_exists ('edit-href', $comment) or array_key_exists ('removed-href', $comment)): ?>
        <div class="e2-comment-control-area">
          <div class="e2-admin-couple e2-comment-control-area-actions">

            <div class="e2-admin-couple-item e2-admin-couple-item_recovered e2-popup-menu">
              <button type="button" class="e2-popup-menu-button">
                <span class="e2-popup-menu-button-icon"><span class="e2-svgi"><?= _SVG ('chevron-down') ?></span></span>
                <span class="e2-popup-menu-button-text"><?= _S ('ab--menu-actions') ?></span>
              </button>

              <div class="e2-popup-menu-widget">
                <?php if (!$comment['replying?'] and array_key_exists ('reply-href', $comment)): ?>
                  <a href="<?= $comment['reply-href'] ?>" class="nu e2-popup-menu-widget-item">
                    <span class="e2-popup-menu-widget-item-icon">
                      <span class="e2-svgi"><?= _SVG ('reply') ?></span>
                    </span>
                    <span class="e2-popup-menu-widget-item-text"><?= _S ('mi--reply') ?></span>
                  </a>
                <?php endif; ?>

                <?php if (array_key_exists ('edit-href', $comment)): ?>
                  <a href="<?= $comment['edit-href'] ?>" class="nu e2-popup-menu-widget-item">
                    <span class="e2-popup-menu-widget-item-icon">
                      <span class="e2-svgi"><?= _SVG ('edit') ?></span>
                    </span>
                    <span class="e2-popup-menu-widget-item-text"><?= _S ('mi--edit') ?></span>
                  </a>
                <?php endif; ?>

                <?php if (array_key_exists ('important-toggle-href', $comment)): ?>
                  <a href="<?= $comment['important-toggle-href'] ?>"
                      class="nu e2-popup-menu-widget-item <?= ($comment['important?']? 'e2-admin-item_on' : '') ?>"
                      data-e2-popup-menu-action="do-not-close-popup-menu"
                      data-e2-js-action="toggle-important"
                  >
                    <span class="e2-popup-menu-widget-item-icon">
                      <span class="e2-toggle-state-off"><span class="e2-svgi"><?= _SVG ('favourite-off') ?></span></span>
                      <span class="e2-toggle-state-on"><span class="e2-svgi"><?= _SVG ('favourite-on') ?></span></span>
                      <span class="e2-toggle-state-thinking"><span class="e2-svgi"><?= _SVG ('spin') ?></span></span>
                    </span>
                    <span class="e2-popup-menu-widget-item-text"><?= _S ('mi--highlight') ?></span>
                  </a>
                <?php endif ?>

                <hr class="e2-popup-menu-widget-separator">

                <?php if (array_key_exists ('removed-href', $comment)): ?>
                  <a href="<?= $comment['removed-href'] ?>"
                      class="nu e2-popup-menu-widget-item e2-popup-menu-widget-item_remove"
                      data-e2-js-action="removed-href,couple-trigger"
                  >
                    <span class="e2-popup-menu-widget-item-icon">
                      <span class="e2-toggle-state-off"><span class="e2-svgi"><?= _SVG ('trash') ?></span></span>
                      <span class="e2-toggle-state-thinking"><span class="e2-svgi"><?= _SVG ('spin') ?></span></span>
                    </span>
                    <span class="e2-popup-menu-widget-item-text"><?= _S ('mi--remove') ?></span>
                  </a>
                <?php endif ?>
              </div>
            </div>

            <div class="e2-admin-couple-item e2-admin-couple-item_removed e2-admin-couple-item_hidden">
              <?php if (array_key_exists ('replaced-href', $comment)): ?>
                <a href="<?= $comment['replaced-href'] ?>" class="nu e2-admin-link e2-admin-item" data-e2-js-action="replaced-href,couple-trigger" title="<?= _S ('gs--replace') ?>">
                  <span class="e2-admin-item-icon">
                    <span class="e2-svgi"><?= _SVG ('replace') ?></span>
                  </span>
                  <span class="e2-admin-item-text"><?= _S ('gs--replace') ?></span>
                </a>
              <?php endif; ?>
            </div>

            <div class="e2-admin-couple-spinner">
              <span class="e2-admin-couple-spinner-icon">
                <span class="e2-svgi"><?= _SVG ('spin') ?></span>
              </span>
            </div>

          </div>
        </div>
      <?php endif ?>
    </div>

    <?php if (@$content['form'] != 'form-comment-reply' and $comment['replied?']) { ?>
      <div class="e2-comment e2-reply">
        <div class="e2-comment-userpic-area">
          <div class="e2-comment-userpic-area-inner">
            <?php if ($content['blog']['userpic-set?']) { ?>
              <img src="<?= $content['blog']['userpic-href'] ?>" class="e2-comment-userpic-area-inner__img" alt="" />
            <?php } else { ?>
              <div class="e2-comment-userpic-area-inner-placeholder"><?= _SVG ('userpic') ?></div>
            <?php } ?>
          </div>
        </div>

        <div class="e2-comment-content-area">
          <span class="e2-comment-author e2-comment-piece-markable <?php if (@$comment['reply-important?']) echo 'e2-comment-piece-marked' ?>"><?= @$comment['author-name'] ?></span>

          <?php if (array_key_exists ('reply-time', $comment)) { ?>
            <span class="e2-comment-date" title="<?=_DT ('j {month-g} Y, H:i, {zone}', @$comment['reply-time'])?>">
          <?= _AGO ($comment['reply-time']) ?>
        </span>
          <?php } ?>

          <div class="e2-comment-content e2-text" <?= $comment['reply-visible?']? '' : 'style="display: none"' ?>>
            <?=@$comment['reply']?>
          </div>
        </div>

        <?php if (array_key_exists ('edit-reply-href', $comment) or array_key_exists ('removed-reply-href', $comment)): ?>
          <div class="e2-comment-control-area">
            <div class="e2-admin-couple e2-comment-control-area-actions">

              <div class="e2-admin-couple-item e2-admin-couple-item_recovered e2-popup-menu">
                <button type="button" class="e2-popup-menu-button">
                  <span class="e2-popup-menu-button-icon"><span class="e2-svgi"><?= _SVG ('chevron-down') ?></span></span>
                  <span class="e2-popup-menu-button-text"><?= _S ('ab--menu-actions') ?></span>
                </button>

                <div class="e2-popup-menu-widget">
                  <?php if (array_key_exists ('edit-reply-href', $comment)): ?>
                    <a href="<?= $comment['edit-reply-href'] ?>" class="nu e2-popup-menu-widget-item">
                  <span class="e2-popup-menu-widget-item-icon">
                    <span class="e2-svgi"><?= _SVG ('edit') ?></span>
                  </span>
                      <span class="e2-popup-menu-widget-item-text"><?= _S ('mi--edit') ?></span>
                    </a>
                  <?php endif; ?>

                  <?php if (array_key_exists ('reply-important-toggle-href', $comment)): ?>
                    <a href="<?= $comment['reply-important-toggle-href'] ?>"
                        class="nu e2-popup-menu-widget-item <?= ($comment['reply-important?']? 'e2-admin-item_on' : '') ?>"
                        data-e2-popup-menu-action="do-not-close-popup-menu"
                        data-e2-js-action="toggle-important"
                    >
                  <span class="e2-popup-menu-widget-item-icon">
                    <span class="e2-toggle-state-off"><span class="e2-svgi"><?= _SVG ('favourite-off') ?></span></span>
                    <span class="e2-toggle-state-on"><span class="e2-svgi"><?= _SVG ('favourite-on') ?></span></span>
                    <span class="e2-toggle-state-thinking"><span class="e2-svgi"><?= _SVG ('spin') ?></span></span>
                  </span>
                      <span class="e2-popup-menu-widget-item-text"><?= _S ('mi--highlight') ?></span>
                    </a>
                  <?php endif ?>

                  <hr class="e2-popup-menu-widget-separator">

                  <?php if (array_key_exists ('removed-reply-href', $comment)): ?>
                    <a href="<?= $comment['removed-reply-href'] ?>"
                        class="nu e2-popup-menu-widget-item e2-popup-menu-widget-item_remove"
                        data-e2-js-action="removed-href,couple-trigger"
                    >
                  <span class="e2-popup-menu-widget-item-icon">
                    <span class="e2-toggle-state-off"><span class="e2-svgi"><?= _SVG ('trash') ?></span></span>
                    <span class="e2-toggle-state-thinking"><span class="e2-svgi"><?= _SVG ('spin') ?></span></span>
                  </span>
                      <span class="e2-popup-menu-widget-item-text"><?= _S ('mi--remove') ?></span>
                    </a>
                  <?php endif ?>
                </div>
              </div>

              <div class="e2-admin-couple-item e2-admin-couple-item_removed e2-admin-couple-item_hidden">
                <?php if (array_key_exists ('replaced-reply-href', $comment)): ?>
                  <a href="<?= $comment['replaced-reply-href'] ?>"
                      class="nu e2-admin-link e2-admin-item"
                      data-e2-js-action="replaced-href,couple-trigger"
                  >
                <span class="e2-admin-item-icon">
                  <span class="e2-svgi"><?= _SVG ('replace') ?></span>
                </span>
                    <span class="e2-admin-item-text">* Вернуть</span>
                  </a>
                <?php endif; ?>
              </div>

              <div class="e2-admin-couple-spinner">
            <span class="e2-admin-couple-spinner-icon">
              <span class="e2-svgi"><?= _SVG ('spin') ?></span>
            </span>
              </div>

            </div>
          </div>
        <?php endif ?>
      </div>
    <?php } ?>
  </div>
</div>
