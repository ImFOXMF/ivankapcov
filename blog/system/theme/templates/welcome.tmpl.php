<?php if ($content['class'] == 'frontpage' and $content['blog']['virgin?']) { ?>

<?php if ($content['sign-in']['done?']): ?>

<div class="e2-heading">
  <h2><?= _S ('pt--welcome') ?></h2>
</div>

<div class="e2-text">
  <p class="admin-links"><?= _S ('pt--welcome-text-pre') ?><a href="<?= $content['admin']['new-note-href'] ?>"><?= _S ('pt--welcome-text-href-write') ?></a><?= _S ('pt--welcome-text-or') ?><a href="<?= $content['admin']['settings-href'] ?>"><?= _S ('pt--welcome-text-href-settings') ?></a><?= _S ('pt--welcome-text-post') ?></p>
</div>

<?php endif ?>

<?php } ?>
