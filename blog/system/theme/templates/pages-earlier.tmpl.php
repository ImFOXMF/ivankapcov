<?php if ($content['pages']['earlier-href'] and $content['pages']['earlier-title']): ?>

<div class="e2-pages">
  <a href="<?= $content['pages']['earlier-href'] ?>"><?= $content['pages']['earlier-title'] ?></a>
  <span class="e2-keyboard-shortcut"><?= _SHORTCUT ('navigation-earlier') ?></span>
</div>

<?php endif ?>
