<?php if (array_key_exists ('notes-list', $content) and count ($content['notes-list']) > 0) { ?>

<div class="e2-note-list e2-text">
<?php foreach ($content['notes-list'] as $note): ?>
<?php if ($note['scheduled?']) { ?><div class="e2-nonpublic-label"><?= _S ('gs--will-be-published') ?> <?=_DT ('j {month-g} Y, H:i', @$note['time'])?></div><?php } ?>
<p class="<?= $note['hidden?']? 'e2-note-hidden' : '' ?>">
  <?php if (@$note['favourite?'] ) { ?>
  <a href="<?= $note['href'] ?>" title=""><span class="e2-note-favourite-title"><?= $note['title']?></span></a>
  <?php } else { ?>
  <a href="<?= $note['href'] ?>" title=""><?= $note['title']?></a>
  <?php } ?>
  <?php if (array_key_exists ('text-fragment', $note)) { ?>
  <br /><?= $note['text-fragment']?>
  <?php } ?>
</p>
<?php endforeach; ?>
</div>

<?php } ?>
