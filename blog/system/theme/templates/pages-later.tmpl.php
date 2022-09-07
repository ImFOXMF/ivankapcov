<?php if ($content['pages']['later-href'] and $content['pages']['later-title']): ?>

<div class="e2-pages">
  <a href="<?= $content['pages']['later-href'] ?>"><?= $content['pages']['later-title'] ?></a>
  <span class="e2-keyboard-shortcut"><?= _SHORTCUT ('navigation-later') ?></span>
</div>

<?php endif ?>