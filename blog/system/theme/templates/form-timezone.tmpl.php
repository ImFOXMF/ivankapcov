<form
  action="<?= @$content['form-timezone']['form-action'] ?>"
  method="post"
>            

<div class="form">

<div class="form-control">
  <div class="width-3"><?= _S ('gs--e2-stores-each-posts-timezone') ?></div>
</div>

<div class="form-control">
  <div class="width-3"><?= _S ('gs--e2-autodetects-timezone') ?></div>
</div>

<div class="form-control">
  <div class="form-label input-label"><label><?= _S ('ff--gmt-offset') ?></label></div>
  <div class="form-element">
    <div>
      <div class="e2-select-wrapper width-2">
        <?= $content['form-timezone']['timezone-selector'] ?>
        <span class="e2-select-icon"><span class="e2-svgi"><?= _SVG ('chevron-down') ?></span></span>
      </div>
    </div>
  </div>    
  <div class="form-element">
    <div>
      <label class="checkbox">
      <input type="checkbox"
        name="is_dst" 
        <?= @$content['form-timezone']['dst?']? ' checked="checked"' : '' ?>
      />&nbsp;<?= _S ('ff--with-dst') ?></label><br />
    </div>
    
  </div>
</div>


<div class="form-control">
  <div class="form-element">
    <button type="submit" id="submit-button" class="e2-button e2-submit-button">
      <?= @$content['form-timezone']['submit-text'] ?>
    </button>
  </div>
</div>

</div>

</form>