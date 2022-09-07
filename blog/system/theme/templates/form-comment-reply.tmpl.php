<form
  action="<?=$content['form-comment-reply']['form-action']?>"
  method="post"
  accept-charset="UTF-8"
  name="freply"
  id="freply"
>

<input
  type="hidden"
  name="note-id"
  value="<?= @$content['form-comment-reply']['.note-id'] ?>"
/>

<input
  type="hidden"
  name="comment-id"
  value="<?= @$content['form-comment-reply']['.comment-id'] ?>"
/>

<input
  type="hidden"
  name="reply-action"
  id="reply-action"
  value="<?= @$content['form-comment-reply']['.reply-action'] ?>"
/>

<div class="form">

<?php $comment = $content['comments']['each']['only'] ?>

<div class="form-control">
  <textarea name="text"
    class="required width-4 height-16 e2-textarea-autosize"
    autofocus="autofocus"
    id="text"
  ><?=$content['form-comment-reply']['reply-text']?></textarea>
</div>

<div class="form-control e2-comment-form-meta-area">
  <span class="e2-comment-piece-markable <?php if (@$comment['reply-important?']) echo 'e2-comment-piece-marked' ?>"><?= $content['blog']['author'] ?> •</span>

  <span class="admin-links">
    <?php if (array_key_exists ('reply-important-toggle-href', $comment)): ?>
      <a href="<?= $comment['reply-important-toggle-href'] ?>" class="nu e2-admin-item <?= ($comment['reply-important?']? 'e2-admin-item_on' : '') ?>" data-e2-js-action="toggle-important">
        <span class="e2-svgi">
          <span class="e2-toggle-state-off"><?= _SVG ('favourite-off') ?></span>
          <span class="e2-toggle-state-on"><?= _SVG ('favourite-on') ?></span>
          <span class="e2-toggle-state-thinking"><?= _SVG ('spin') ?></span>
        </span>
      </a>
    <?php endif ?>
  </span>
</div>


<?php if ($content['form-comment-reply']['emailing-possible?']) { ?>
<div class="form-control">
  <label class="checkbox">
  <input
    type="checkbox"
    class="checkbox"
    name="mail-back"
    <?= @$content['form-comment-reply']['mail-back?']? ' checked="checked"' : '' ?>
  />&nbsp;<?= _S ('ff--notify-subscribers') ?>
  </label><br />
</div>
<?php } ?>


<div class="form-control">
  <button type="submit" id="submit-button" class="e2-button e2-submit-button">
    <?= @$content['form-comment-reply']['submit-text'] ?>
  </button>
  <span class="e2-keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span>
</div>

</div>

</form>
