<form
  action="<?=$content['form-comment']['form-action']?>"
  method="post"
  accept-charset="UTF-8"
  name="form-comment"
  id="form-comment"
  style="display: none"
  data-cookie="<?= @$content['form-comment']['cookie-name'] ?>"
  data-cookie-value="<?= @$content['form-comment']['cookie-value'] ?>"
>

<?php if ($content['form-comment']['create:edit?']) { ?>
<div class="e2-section-heading"><?= _S ('gs--your-comment') ?></div>
<?php } ?>

<input
  type="hidden"
  name="note-id"
  value="<?= @$content['form-comment']['.note-id'] ?>"
/>

<input
  type="hidden"
  name="comment-id"
  value="<?= @$content['form-comment']['.comment-id'] ?>"
/>

<input
  type="hidden"
  name="comment-number"
  value="<?= @$content['form-comment']['.comment-number'] ?>"
/>

<input
  type="hidden"
  name="already-subscribed"
  value="<?= @$content['form-comment']['.already-subscribed?'] ?>"
/>

<input
  type="hidden"
  name="gip"
  value="<?= @$content['form-comment']['.gip'] ?>"
/>

<input
  type="hidden"
  name="comment"
  value="&amp;&#x2605;&copy;"
/>

<script type="text/javascript">
  document.write('<in' +'put type="hid' + 'den" name="<?= @$content['form-comment']['nospam-field-name-part-1'] ?>'+'<?= @$content['form-comment']['nospam-field-name-part-2'] ?>" value="">');
</script>

<div class="form">

<div class="form-control">
  <textarea name="text"
    class="required width-4 height-8 e2-textarea-autosize"
    id="text"
    tabindex="3"
  ><?=$content['form-comment']['text']?></textarea>
</div>

<?php $comment = $content['comments']['each']['only'] ?>

<?php if ($content['form-comment']['create:edit?']) { ?>

<?php
  if (
    $content['form-comment']['logged-in?']
    or count ($content['form-comment']['gips'])
  ) {
?>

<div class="form-control">
  <div class="e2-gips e2-hide-on-login<?php if (!$content['form-comment']['logged-in?']) { ?> required<?php } ?>" style="display: <?= !$content['form-comment']['logged-in?'] ? 'block' : 'none' ?>">
  
    <?= _S ('gs--sign-in-via') ?> &nbsp;

    <?php foreach ($content['form-comment']['gips'] as $provider => $href) { ?>
    
    <?php if (!empty ($provider)) { ?>
      &nbsp; <a href="<?= $href ?>" target="gips" class="e2-service-color-<?= $provider ?> nu e2-gip-link">
        <span class="e2-svgi"><?= _SVG ($provider)?></span>
      </a>
    <?php } ?>

    <?php } ?>
    
    <?php if ($content['form-comment']['email-comments-enabled?']) { ?>
      &nbsp; <a href="#" class="e2-service-color-email nu e2-email-fields-revealer">
        <span class="e2-svgi"><?= _SVG ('email')?></span>
      </a>
    <?php } ?>
  </div>


  <div class="e2-gip-info" style="display: <?= $content['form-comment']['logged-in?'] ? 'block' : 'none' ?>">
    <span class="e2-svgi e2-gip-icon"><?= _SVG ($content['form-comment']['logged-in-gip']) ?></span>
    
    <span class="name"><?= @$content['form-comment']['name'] ?></span>

    &nbsp; <a href="<?= $content['form-comment']['logout-url'] ?>" class="nu e2-gip-logout-url">
      <span class="e2-svgi"><?= _SVG ('exit') ?></span>
    </a>
  </div>
  
</div>

<?php } ?>




<?php } else { ?>

<!-- editing. name and star under the text -->

<div class="form-control">

  <div class="e2-comment-form-meta-area">
    <?php if ($comment['gip-used?']) { ?>
      <span class="e2-comment-author e2-comment-piece-markable <?php if (@$comment['important?']) echo 'e2-comment-piece-marked' ?>"><a href="<?= $comment['name-href'] ?>" class="e2-service-color-neutral nu"><span class="e2-svgi e2-svgi-smaller"><?= _SVG ($comment['gip']) ?></span> </a><?= @$comment['name'] ?></span>
    <?php } ?>

    <span class="admin-links">
      <?php if (array_key_exists ('important-toggle-href', $comment)): ?>
        <a href="<?= $comment['important-toggle-href'] ?>" class="nu e2-admin-item <?= ($comment['important?']? 'e2-admin-item_on' : '') ?>" data-e2-js-action="toggle-important">
          <span class="e2-svgi">
            <span class="e2-toggle-state-off"><?= _SVG ('favourite-off') ?></span>
            <span class="e2-toggle-state-on"><?= _SVG ('favourite-on') ?></span>
            <span class="e2-toggle-state-thinking"><?= _SVG ('spin') ?></span>
          </span>
        </a>
      <?php endif ?>
    </span>
  </div>

</div>

<?php } ?>


<?php
  if (
    (
      $content['form-comment']['create:edit?']
      and !$content['form-comment']['logged-in?']
      and $content['form-comment']['email-comments-enabled?']
    ) or (
      !$content['form-comment']['create:edit?'] and !$comment['gip-used?']
    )
  ) {
?>

<div
  class="e2-email-fields e2-hide-on-login"
  style="display: <?=
    ($content['form-comment']['create:edit?'] and !$content['form-comment']['email-comments-only?']) ?
      'none' : 'block'
  ?>"
>

<div class="form-control">
  <div class="form-label input-label"><label><?= _S ('ff--full-name') ?></label></div>
  <div class="form-element">
    <input type="text"
      class="text required width-2"
      tabindex="1"
      id="name"
      name="name"
      value="<?= @$content['form-comment']['name'] ?>"
    />
  </div>
</div>

<div class="form-control">
  <div class="form-label input-label"><label><?= _S ('ff--email') ?></label></div>
  <div class="form-element">
    <div style="position: relative">
      <?php /* a pot full of honey for spammers: */ ?>
      <div style="position: absolute; z-index: 0; left: 0; top: 0; width: 100%; height: 0; overflow: hidden;">
        <input type="text"
          class="text width-2"
          tabindex="-1"
          name="email"
          autocomplete="off"
          value=""
        />
      </div>
      <div style="position: relative; z-index: 1; left: 0; top: 0; width: 100%;">
      <?php /* real input */ ?>
      <input type="text"
        class="text required width-2"
        tabindex="2"
        id="email"
        name="<?= $content['form-comment']['email-field-name'] ?>"
        value="<?= @$content['form-comment']['email'] ?>"
      />
      </div>
    </div>
  </div>

  <?php if ($content['form-comment']['emailing-possible?']) { ?>

  <?php if ($content['form-comment']['show-subscribe?']) { ?>
  <div class="form-element">
    <label class="checkbox">
    <input
      type="checkbox"
      name="subscribe"
      class="checkbox"
      tabindex="4"
      <?= @$content['form-comment']['subscribe?']? ' checked="checked"' : ''?>
    />&nbsp;<?= _S ('ff--subscribe-to-others-comments') ?>
    </label><br />
  </div>
  <?php } ?> 

  <?php if (@$content['form-comment']['subscription-status']) { ?>
  <div class="form-element">
    <p><?= $content['form-comment']['subscription-status'] ?></p>
  </div>
  <?php } ?>

  <?php } ?> 
</div>

</div>

<?php } ?>

<div class="form-control">
  <button type="submit" id="submit-button" class="e2-button e2-submit-button" tabindex="5">
    <?= @$content['form-comment']['submit-text'] ?>
  </button><span class="e2-keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span>
</div>

</div>

</form>