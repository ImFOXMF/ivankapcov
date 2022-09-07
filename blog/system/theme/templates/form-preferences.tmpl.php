<form
  id="form-preferences"
  action="<?= @$content['form-preferences']['form-action'] ?>"
  method="post"
>
  <input
    type="hidden"
    id="e2-blog-title-default"
    name="blog-title-default"
    value="<?= @$content['form-preferences']['blog-title-default'] ?>"
  />
  
  <input
    type="hidden"
    id="e2-blog-author-default"
    name="blog-author-default"
    value="<?= @$content['form-preferences']['blog-author-default'] ?>"
  />
  
  <div class="form">
    <div class="form-part">
      <div class="form-control form-control-big">
        <div class="form-label input-label"><label><?= _S ('ff--blog-title') ?></label></div>
        <div class="form-element">
          <input type="text"
            class="text width-4"
            autofocus="autofocus"
            id="blog-title"
            name="blog-title"
            value="<?= $content['form-preferences']['blog-title'] ?>"
          />
        </div>
      </div>

      <div class="form-control">
        <div class="form-label input-label"><label><?= _S ('ff--subtitle') ?></label></div>
        <div class="form-element">
          <textarea
            class="width-4 height-2 e2-textarea-autosize"
            id="blog-subtitle"
            name="blog-subtitle"
          ><?= @$content['form-preferences']['blog-subtitle'] ?></textarea>
        </div>
      </div>
      
      <div class="form-control form-control-big">
        <div class="form-label input-label"><label><?= _S ('ff--blog-author-picture-and-name') ?></label></div>
        <div class="form-element">
          <div class="e2-user-picture-container <?php if (!@$content['blog']['userpic-set?']) { ?>e2-user-picture-container_empty<?php } ?> e2-user-picture-container_large e2-external-drop-target" data-href="<?= $content['blog']['userpic-upload-action'] ?>">
            <div class="e2-user-picture-inner">
              <img
                src="<?php if (@$content['blog']['userpic-set?']) { ?><?= $content['form-preferences']['userpic-href'] ?><?php } ?>"
                title="<?php _S ('gs--drag-userpic-here') ?>"
                class="e2-user-picture-image"
                alt=""
              />
              <div class="e2-user-picture-placeholder">
                <?= _SVG ('userpic-placeholder') ?>
              </div>
              <span class="e2-user-picture-spinner">
                <?= _SVG ('spin-progress') ?>
              </span>
              <label for="e2-user-picture-input" class="e2-user-picture-inputlabel">
                <input type="file" id="e2-user-picture-input" class="e2-user-picture-input"/>
              </label>
            </div>
            <button
              type="button"
              class="e2-button e2-button_transparent e2-user-picture-remove"
              data-href="<?= $content['blog']['userpic-remove-action'] ?>"
            >
              <?= _S ('gs--remove-userpic') ?>
              <span class="e2-svgi e2-svgi_30"><?= _SVG ('close') ?></span>
            </button>
          </div>
        </div>
      </div>

      <div class="form-control">
        <div class="form-element">
          <input type="text"
            class="text width-2"
            id="blog-author"
            name="blog-author"
            value="<?= $content['form-preferences']['blog-author'] ?>"
          />
        </div>
      </div>
      
    </div>
  
    <?php if (count (@$content['form-preferences']['templates']) > 1) { ?>
      <div class="form-part">
        <div class="form-control">
          <div class="form-label">
            <p><label><?= _S ('ff--theme') ?></label></p>
            <?php if (array_key_exists ('theme-preview-href', $content['admin'])) { ?>
            <p class="admin-links">
              <a class="e2-template-preview-link" href="<?= @$content['admin']['theme-preview-href'] ?>" target="_blank">
                <?= _S ('gs--theme-preview') ?> <span class="e2-svgi"><?= _SVG ('blank-window') ?></span>
              </a>
            </p>
            <?php } ?>
          </div>
          <div class="form-element">
            <div id="e2-template-selector" class="e2-template-selector">
              <?php foreach ($content['form-preferences']['templates'] as $template) { ?>
                <?php
                  if ($template['current?']) {
                    $template_current = $template;
                  }
                ?>
                <label
                  class="e2-template-preview <?php if ($template['current?']) {?>e2-template-preview_current<?php } ?>"
                >
                  <input
                    class="e2-template-preview__input"
                    type="radio"
                    name="template"
                    value="<?= $template['name'] ?>"
                    <?php if ($template['current?']) {?>checked<?php } ?>
                    data-preview-url="<?= $template['preview-url'] ?>"
                    data-supports-dark-mode="<?php if ($template['supports-dark-mode?']) {?>true<?php } else { ?>false<?php } ?>"
                  />
                  <span class="e2-template-name">
                    <span class="e2-pseudolink e2-admin-link"><?= $template['display-name'] ?></span>
                  </span>
                  <div class="e2-template-preview-image" style="background: <?= $template['colors']['background'] ?>">
                    <div class="e2-template-preview-image-heading" style="color: <?= $template['colors']['headings'] ?>"></div>
                    <div class="e2-template-preview-image-text" style="color: <?= $template['colors']['text'] ?>">
                      <div class="e2-template-preview-image-text-line"></div>
                      <div class="e2-template-preview-image-text-line"></div>
                      <div class="e2-template-preview-image-text-line"></div>
                      <div class="e2-template-preview-image-text-line"></div>
                      <div class="e2-template-preview-image-text-line"></div>
                    </div>
                    <div class="e2-template-preview-image-link" style="color: <?= $template['colors']['link'] ?>"></div>
                  </div>
                </label>
              <?php } ?>
            </div>
          </div>  
        </div>
        <div class="form-element" <?php if (!$template_current['supports-dark-mode?']) {?>style="display: none;"<?php } ?>>
          <label class="checkbox">
            <input
              type="checkbox"
              id="respond-to-dark-mode"
              name="respond-to-dark-mode"
              class="checkbox"
              <?= @$content['form-preferences']['respond-to-dark-mode?']? ' checked="checked"' : ''?>
            /> <?= _S ('ff--respond-to-dark-mode') ?>
          </label>
        </div>
      </div>
    <?php } ?>
    
    <div class="form-part">
      <div class="form-control">
        <div class="form-label input-label"><label><?= _S ('ff--language') ?></label></div>
        <div class="form-element">
          <div class="e2-select-wrapper width-2">
            <select class="e2-select" name="language" size="1">
              <?php foreach ($content['form-preferences']['languages'] as $value => $lang) { ?>
                <option
                  value="<?= $value ?>"
                  <?php if ($lang['selected?']) { ?>selected="selected"<?php } ?>
                >
                  <?= $lang['display-name'] ?>
                </option>
              <?php } ?>
            </select>
            <span class="e2-select-icon"><span class="e2-svgi"><?= _SVG ('chevron-down') ?></span></span>
          </div>
        </div>
      </div>

      <div class="form-control">
        <div class="form-label input-label"><label><?= _S ('ff--posts') ?></label></div>
        <div class="form-element">
          <label><input
            type="number"
            class="text"
            style="width: 2.66em"
            id="notes-per-page"
            name="notes-per-page"
            pattern="[0-9]*" min="3" max="100" maxlength="3" inputmode="numeric"
            value="<?= $content['form-preferences']['notes-per-page'] ?>"
            />
          <?= _S ('ff--items-per-page-after') ?>
          </label>
        </div>
        <div class="form-element">
          <label class="checkbox">
          <input
            type="checkbox"
            id="show-view-counts"
            name="show-view-counts"
            class="checkbox"
            <?= @$content['form-preferences']['show-view-counts?']? ' checked="checked"' : ''?>
          /> <?= _S ('ff--show-view-counts') ?>
          </label><br />
        </div>
        <div class="form-element">
          <label class="checkbox">
          <input
            type="checkbox"
            id="show-sharing-buttons"
            name="show-sharing-buttons"
            class="checkbox"
            <?= @$content['form-preferences']['show-sharing-buttons?']? ' checked="checked"' : ''?>
          /> <?= _S ('ff--show-sharing-buttons') ?>
          </label><br />
        </div>
      </div>
      <div class="form-control">
        <div class="form-label"><label><?= _S ('ff--comments') ?></label></div>
      
        <div class="form-element">
      
          <label class="checkbox">
          <input
            type="checkbox"
            id="comments-default-on"
            name="comments-default-on"
            class="checkbox"
            <?= @$content['form-preferences']['comments-default-on?']? ' checked="checked"' : ''?>
          /> <?= _S ('ff--comments-enable-by-default') ?>
          </label><br />
      
        </div>
        <div class="form-element">
      
          <label class="checkbox">
          <input
            type="checkbox"
            id="comments-require-gip"
            name="comments-require-gip"
            class="checkbox"
            <?= @$content['form-preferences']['comments-require-gip?']? ' checked="checked"' : ''?>
          /> <?= _S ('ff--comments-require-social-id') ?>
          </label><br />
      
        </div>
      
        <div class="form-element">
      
          <label class="checkbox">
          <input
            type="checkbox"
            id="comments-fresh-only"
            name="comments-fresh-only"
            class="checkbox"
            <?= @$content['form-preferences']['comments-fresh-only?']? ' checked="checked"' : ''?>
          /> <?= _S ('ff--only-for-recent-posts') ?>
          </label><br />
      
        </div>

        <?php if ($content['form-preferences']['emailing-possible?']) { ?>
        <div class="form-element">
      
          <label class="checkbox">
          <input
            type="checkbox"
            id="email-notify"
            name="email-notify"
            class="checkbox"
            <?= @$content['form-preferences']['email-notify?']? ' checked="checked"' : ''?>
          /> <?= _S ('ff--send-by-email') ?>
          </label><br />
      
        </div>
        <?php } ?>
      
      </div>

      <?php if ($content['form-preferences']['emailing-possible?']) { ?>
      <div class="form-control">
        <div class="form-label input-label"><label><?= _S ('ff--email') ?></label></div>
        <div class="form-element">
          <input type="text"
            class="text width-2"
            id="email"
            name="email"
            value="<?= $content['form-preferences']['email'] ?>"
          />
        </div>
      </div>
      <?php } ?>

      <div class="form-control">
        <div class="form-label input-label"><label><?= _S ('ff--blog-description') ?></label></div>
        <div class="form-element">
          <textarea
            class="width-4 height-2 e2-textarea-autosize"
            id="blog-meta-description"
            name="blog-meta-description"
          ><?= @$content['form-preferences']['blog-meta-description'] ?></textarea>
          <div class="form-control-sublabel">
            <?= _S ('gs--search-engines-social-networks-aggregators') ?>
          </div>
        </div>
      </div>

    </div>
    
    <?php if (@$content['form-preferences']['includes-yandex-metrika?']) { ?>
      <div class="form-part">
        <div class="form-control">
          <div class="form-label input-label">
            <label for="yandex-metrika"><?= _S ('ff--yandex-metrika') ?></label>
          </div>
          <div class="form-element">
            <textarea
              class="width-4 height-4 e2-textarea-autosize"
              id="yandex-metrika"
              name="yandex-metrika"
            ><?= $content['form-preferences']['yandex-metrika'] ?></textarea>
          </div>
        </div>
        <div class="form-control">
          <div class="form-label input-label">
            <label for="google-analytics"><?= _S ('ff--google-analytics') ?></label>
          </div>
          <div class="form-element">
            <textarea
              class="width-4 height-4 e2-textarea-autosize"
              id="google-analytics"
              name="google-analytics"
            ><?= $content['form-preferences']['google-analytics'] ?></textarea>
          </div>
        </div>
      </div>
    <?php } ?>
    
    <div class="form-control">
      <div class="form-element">
        <button type="submit" id="submit-button" class="e2-button e2-submit-button">
          <?= @$content['form-preferences']['submit-text'] ?>
        </button>
        <span class="e2-keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span>
      </div>
    </div>
  </div>
</form>

<?php if (@$content['form-preferences']['space-usage'] or @$content['form-preferences']['show-payment-info?']) { ?>

<hr />

<div class="form">
  <div class="form-control">
    <div class="form-element">

      <?php if (@$content['form-preferences']['show-payment-info?']) { ?>
        <div class="e2-text">
          <p>

          <?php if (@$content['form-preferences']['paid-period']) { ?>
          ✓ <?= _S ('gs--paid-until') ?> <?=_DT ('j {month-g} Y', $content['form-preferences']['paid-until'])?>
          <?php } elseif (@$content['form-preferences']['paid-period-ended']) { ?>
          <span class="e2-error"><?= _S ('gs--paid-period-ended') ?> <?=_DT ('j {month-g} Y', $content['form-preferences']['paid-until'])?></span>
          <?php } else { ?>
          <span class="e2-error"><?= _S ('gs--not-paid') ?></span>
          <?php } ?>

          <?php if (!@$content['form-preferences']['paid-period']) { ?>
          <?php if ((string) $content['form-preferences']['pay-href'] !== '') { ?>
            · <a href="<?=$content['form-preferences']['pay-href']?>"><?= _S ('bt--learn-about-payment') ?></a>
          <?php } ?>
          <?php } ?>
          </p>
        </div>
      <?php } ?>

      <?php if (@$content['form-preferences']['space-usage']) { ?>
        <div class="e2-text">
          <p><?= $content['form-preferences']['space-usage'] ?></p>
        </div>
      <?php } ?>

    </div>
  </div>
</div>

<?php } ?>