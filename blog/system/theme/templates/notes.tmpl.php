<?php if ($content['class'] == 'drafts') { ?>
<div class="e2-notes-unsaved" id="e2-notes-unsaved"><?= _S ('gs--unsaved-changes') ?></div>
<p id="e2-unsaved-note-prototype" style="display: none"><a href="" class="e2-admin-link nu"><u></u></a><span class="e2-unsaved-led"></span></p>
<?php } ?>

<?php if (@$content['pages']['timeline?']) _T ('pages-later') ?>

<?php foreach ($content['notes'] as $note) { ?>
<?php $content['_']['_note'] = $note; ?>

<?php if ($content['class'] === 'drafts') {?>
<?php _T ('note-preview') ?>
<?php } elseif (in_array ($content['class'], ['found', 'tag', 'day', 'popular', 'most-commented'])) { ?>
<?php _T ('note-snippet') ?>
<?php } elseif ($note['scheduled?'] and $content['class'] !== 'note') { ?>
<?php _T ('note-snippet') ?>
<?php } elseif ($content['class'] == 'themepreview' and !empty ($note['snippet-text'])) { ?>
<?php _T ('note-snippet') ?>
<?php } else { ?>
<?php _T ('note') ?>
<?php } ?>

<?php } ?>

<?php if (@$content['pages']['timeline?']) _T ('pages-earlier') ?>
