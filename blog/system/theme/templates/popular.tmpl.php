<?php if (array_key_exists ('popular', $content)) { ?>
<?php if (array_key_exists ('each', $content['popular'])) { ?> 
<?php if (($content['class'] == 'note' and $content['note']['only']['public?']) or $content['class'] == 'themepreview' or $content['class'] == '404') { ?>

<?php $content['_']['_notes_gallery'] = $content['popular']; ?>

<div class="e2-section-heading">
  <?=$content['popular']['title']?>
</div>

<?php _T ('notes-gallery') ?>

<?php } ?>
<?php } ?>
<?php } ?>
