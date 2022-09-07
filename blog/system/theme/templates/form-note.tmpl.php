<?php _LIB ('jquery.mousewheel') ?>
<?php _LIB ('jquery.actual') ?>
<?php _LIB ('momentjs') ?>
<?php _LIB ('goodyear') ?>
<?php _LIB ('textarea-caret-position') ?>
<?php _LIB ('chosen') ?>

<form
  id="form-note"
  action="<?=$content['form-note']['form-action']?>"
  enctype="multipart/form-data"
  method="post"
  accept-charset="utf-8"
  autocomplete="off"
>

  <input
    type="hidden"
    id="note-timestamp"
    name="note-timestamp"
    value="<?=@$content['form-note']['.last-modified-stamp']?>"
  />
  
  <input
    type="hidden"
    id="note-id"
    name="note-id"
    value="<?= @$content['form-note']['.note-id'] ?>"
  />
  
  <input
    type="hidden"
    id="formatter-id"
    name="formatter-id"
    value="<?= @$content['form-note']['.formatter-id'] ?>"
  />
  
  <input
    type="hidden"
    id="is-note-published"
    name="is-note-published"
    value="<?= @$content['form-note']['.published?'] ? 'true' : 'false' ?>"
  />
  
  <input
    type="hidden"
    name="old-tags-hash"
    value="<?= @$content['form-note']['.old-tags-hash'] ?>"
  />
  
  <input
    type="hidden"
    name="old-stamp"
    value="<?= @$content['form-note']['stamp-formatted'] ?>"
  />
  
  <input
    type="hidden"
    id="action"
    name="action"
    value="<?= @$content['form-note']['.action'] ?>"
  />
  
  <input
    type="hidden"
    id="browser-offset"
    name="browser-offset"
    value="unknown"
  />
  
  <script>
    d = new Date()
    document.getElementById('browser-offset').value = - d.getTimezoneOffset()
  </script>
  
  <a id="e2-note-livesave-action" href="<?= $content['form-note']['form-note-livesave-action'] ?>"></a>
  
  <div class="form" id="e2-note-form-wrapper">
  
    <div class="form-control form-control-big">
      <div class="form-label input-label">
        <label><?= _S ('ff--title') ?></label>
      </div>
      <div class="form-element">
        <input type="text"
          class="text big required unedited width-4 e2-smart-title"
          autocomplete="off"
          tabindex="1"
          id="title"
          name="title"
          value="<?= @$content['form-note']['title'] ?>"
        />
      </div>
    </div>
    
    <div class="form-control">
      <div class="form-subcontrol">
    
        <div class="form-label form-label-sticky input-label">
          <label>
            <?= _S ('ff--text') ?>
            <a href="http://<?= _S ('e2--website-host') ?>/help/text/" target="_blank" class="nu e2-admin-link"><span class="e2-svgi"><?= _SVG ('help') ?></span></a>
          </label>
    
          <div class="form-label-saveinfo">
            <span id="livesaving" style="display: none"><?= _S ('ff--saving') ?>
              <span class="e2-svgi"><?= _SVG ('spin') ?></span>
            </span>
            <span id="livesave-button" class="e2-keyboard-shortcut e2-clickable-keyboard-shortcut e2-admin-link" style="display: none"><?= _SHORTCUT ('livesave')? _SHORTCUT ('livesave') : _S ('ff--save') ?></span>
            <span class="e2-unsaved-led" style="display: none"></span>
          </div>
    
        </div>
    
        <div class="form-element">
          <textarea name="text"
            class="required e2-text-textarea e2-textarea-autosize full-width height-16<?php if (@$content['form-note']['uploads-enabled?']) { ?> e2-external-drop-target e2-external-drop-target-textarea e2-external-drop-target-altable<?php } ?>"
            id="text"
            tabindex="2"
          ><?=$content['form-note']['text']?></textarea>
        </div>
    
      </div>
    
      <div class="form-subcontrol">
        <div class="form-element">
          <?php _T ('uploads') ?>
        </div>
      </div>
     
      <?php if (@$content['form-note']['space-usage']) { ?>
      <div class="form-subcontrol">
        <div class="form-element"><?= $content['form-note']['space-usage'] ?></div>
      </div>
      <?php } ?>
    
    </div>
    
    <div class="form-control">
      <div class="form-label input-label">
        <label><?= _S ('ff--tags') ?></label>
      </div>
    
      <div class="form-element">
        <select id="tags" name="tags[]" tabindex="3" class="width-4 chzn-select" multiple="multiple" data-placeholder=" " size="2">
          <?php foreach ($content['form-note']['tags-info'] as $tag) { ?>
            <option <?= $tag['selected?']? 'selected' : '' ?>><?= $tag['name'] ?></option>
          <?php } ?>
        </select><br />
      </div>
    </div>
    
    <?php if (@$content['form-note']['time'] or @$content['form-note']['alias']) { ?>
      <div class="form-control">
        <div class="form-element">
      
          <div class="e2-note-time-and-url">
            <a href="javascript: return false" onclick="$ ('.e2-note-time-and-url').slideToggle(333); return false" class="e2-pseudolink e2-admin-link"><?php if (@$content['form-note']['draft?']) { ?><?= _S ('ff--will-be-published') ?><?php } else { ?><?= _S ('ff--is-published') ?><?php } ?> <?php if (@$content['form-note']['alias']) { ?>
            <?= _S ('ff--at-address') ?> .../<?= @$content['form-note']['alias'] ?>/
            <?php } ?>
            <?php if (@$content['form-note']['time']) { ?>
            <span title="<?=_DT ('j {month-g} Y, H:i, {zone}', $content['form-note']['time'])?>"><?= _DT ('j {month-g} Y, H:i', $content['form-note']['time']) ?></span>
            <?php } ?>
            </a>
          </div>
      
          <div class="e2-note-time-and-url" style="display: none">
      
            <div class="form-subcontrol">
              <textarea name="summary"
                class="e2-text-textarea e2-textarea-autosize width-4 height-2"
                id="summary"
                tabindex="5"
                placeholder="<?= _S ('ff--summary') ?>"
              ><?=$content['form-note']['summary']?></textarea>
              <div class="form-control-sublabel">
                <?= _S ('gs--search-engines-social-networks-aggregators') ?>
              </div>
            </div>
      
            <div class="form-subcontrol">
              <input type="text"
                class="text required unedited width-2"
                autocomplete="off"
                tabindex="6"
                id="alias"
                name="alias"
                placeholder="<?= @$content['form-note']['alias-autogenerated'] ?>"
                value="<?= @$content['form-note']['alias'] ?>"
              />
            </div>
      
            <?php if (@$content['form-note']['time']) { ?>
      
            <div class="form-subcontrol">
              <input type="text"
                tabindex="7"
                class="text width-2 goodyear"
                name="stamp"
                id="stamp"
                placeholder="<?= @$content['form-note']['stamp-formatted'] ?>"
                data-goodyear-language="<?= $content['blog']['language'] ?>"
                data-goodyear-format="DD.MM.YYYY HH:mm:ss"
                data-goodyear-min-year="1970"
                data-goodyear-max-year="2035"
                data-goodyear-min-date="01-01-1970"
                data-goodyear-hour-picker="true"
                data-goodyear-minute-picker="true"
                data-goodyear-minutes-step="1"
                value="<?= @$content['form-note']['stamp-formatted'] ?>"
              />
            </div>
      
            <?php } ?>
      
          </div>
        </div>
      </div>
    <?php } ?>
    
    <div class="form-control">
      <div class="form-element">
        <button type="submit" id="submit-button" class="e2-button e2-submit-button" tabindex="10">
          <?= @$content['form-note']['submit-text'] ?>
        </button>
        <span class="e2-keyboard-shortcut" id="submit-keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span>
        &nbsp;&nbsp;&nbsp;
        <span class="e2-svgi" id="note-saving" style="display: none"><?= _SVG ('spin') ?></span><span id="note-saved" class="e2-svgi" style="display: none"><?= _SVG ('tick') ?></span>
      </div>
    </div>
  
  </div>

</form>
