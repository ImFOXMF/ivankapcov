<form
  id="form-tag"
  action="<?= @$content['form-tag']['form-action'] ?>"
  enctype="multipart/form-data"
  method="post"
  accept-charset="utf-8"
  autocomplete="off"
>

 <input
    type="hidden"
    id="tag-id"
    name="tag-id"
    value="<?= @$content['form-tag']['.tag-id'] ?>" 
  />
  
  <input
    type="hidden"
    id="formatter-id"
    name="formatter-id"
    value="<?= @$content['form-tag']['.formatter-id'] ?>"
  />
  
  <input
    type="hidden"
    name="cache-sensitive-hash"
    value="<?= @$content['form-tag']['.cache-sensitive-hash'] ?>"
  />
  
  <div class="form">
  
    <div class="form-part">
      <div class="form-control form-control-big">
        <div class="form-label input-label"><label><?= _S ('ff--tag-name') ?></label></div>
        <div class="form-element">
          <input type="text"
            class="text big required width-2"
            autofocus="autofocus"
            id="tag"
            name="tag"
            value="<?= @$content['form-tag']['tag'] ?>"
          />
        </div>
      </div>
      
      <div class="form-control">
        <div class="form-label input-label"><label><?= _S ('ff--tag-urlname') ?></label></div>
        <div class="form-element">
          <input type="text"
            class="text required width-2"
            id="urlname"
            name="urlname"
            value="<?= @$content['form-tag']['alias'] ?>"
          />
        </div>
      </div>
    </div>
    
    <div class="form-part">
      <div class="form-control">
        <div class="form-label input-label"><label><?= _S ('ff--tag-page-title') ?></label></div>
        <div class="form-element">
          <input type="text"
            class="text required width-3"
            id="page-title"
            name="page-title"
            placeholder="<?= @$content['form-tag']['page-title-placeholder'] ?>"
            value="<?= @$content['form-tag']['page-title'] ?>"
          />
        </div>
      </div>

      <div class="form-control">
        <div class="form-subcontrol">
      
          <div class="form-label form-label-sticky input-label">
            <label>
              <?= _S ('ff--tag-introductory-text') ?>
              <a href="http://blogengine.ru/help/text/" target="_blank" class="nu e2-admin-link"><span class="e2-svgi"><?= _SVG ('help') ?></span></a>
            </label>
          </div>
      
          <div class="form-element">
            <textarea name="description"
              class="required e2-text-textarea e2-textarea-autosize e2-external-drop-target e2-external-drop-target-textarea e2-external-drop-target-altable full-width height-16"
              id="text"
              autocomplete="off"
            ><?=$content['form-tag']['description']?></textarea>
          </div>
        </div>
      
        <div class="form-subcontrol">
          <div class="form-element">
            <?php _T ('uploads') ?>
          </div>
        </div>
      
        <?php if (@$content['form-tag']['space-usage']) { ?>
        <div class="form-subcontrol">
          <div class="form-element"><?= $content['form-tag']['space-usage'] ?></div>
        </div>
        <?php } ?>
      
      </div>

      <div class="form-control">
        <div class="form-label input-label"><label><?= _S ('ff--summary') ?></label></div>
        <div class="form-element">
          <textarea
            class="width-4 height-2 e2-textarea-autosize"
            id="summary"
            name="summary"
          ><?=$content['form-tag']['summary']?></textarea>
          <div class="form-control-sublabel">
            <?= _S ('gs--search-engines-social-networks-aggregators') ?>
          </div>
        </div>
      </div>

    </div>
      
    <div class="form-control">
      <div class="form-element">
        <button type="submit" id="submit-button" class="e2-button e2-submit-button">
          <?= @$content['form-tag']['submit-text'] ?>
        </button>
        <span class="e2-keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span>
      </div>
    </div>
  
  </div>

</form>
