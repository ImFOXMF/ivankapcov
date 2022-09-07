<?php $note = $content['_']['_note']; ?>
<?php unset ($content['_']['_note']); ?>

<div class="e2-note-snippet<?= $note['hidden?']? ' e2-note-hidden' : '' ?>">

<?php // THUMBS // ?>
<?php $thumbs = []; ?>
<?php if (empty ($note['_pubpreview'])) { ?>
<?php if (array_key_exists ('thumbs', $note)) $thumbs = $note['thumbs']; ?>
<?php } else { ?>
<?php if (array_key_exists ('og-images-thumbs', $note)) $thumbs = $note['og-images-thumbs']; ?>
<?php } ?>

<?php if (count ($thumbs)) { ?>

<?php if (!_AT ($note['href'])) { ?> 
<a href="<?= $note['href'] ?>" class="nu">
<?php } ?> 

<div class="e2-note-thumbs">
<?php if (0) { ?>
<?php foreach ($thumbs as $x) if ($x['is-available?'])  { ?><div class="e2-note-thumb <?php if ($note['has-highlighted-thumbs?'] and !$x['highlighted?']) { ?>e2-note-thumb-dimmed<?php } ?>" style="background-image: url('<?= $x['src'] ?>')"><?php if ($x['highlighted?']) { ?><mark><?php } ?><?php if ($x['highlighted?']) { ?></mark><?php } ?></div><?php } ?>
<?php } else { ?>
<?php foreach ($thumbs as $x) if ($x['is-available?']) { ?><div class="e2-note-thumb"><?php if ($x['highlighted?']) { ?><mark><?php } ?><img src="<?= $x['src'] ?>" width="<?= $x['width'] ?>" height="<?= $x['height'] ?>" class="<?php if ($note['has-highlighted-thumbs?'] and !$x['highlighted?']) { ?>e2-note-thumb-dimmed<?php } ?>" alt="" /><?php if ($x['highlighted?']) { ?></mark><?php } ?></div><?php } ?>
<?php } ?>
</div>

<?php if (!_AT ($note['href'])) { ?> 
</a>
<?php } ?> 

<?php } ?>

<div>

<?php if (empty ($note['_pubpreview'])): ?>
<?php if (array_key_exists ('edit-href', $note)): ?>
  <span class="admin-links admin-links-floating">
    <?php if (array_key_exists ('favourite-toggle-href', $note)) { ?>
      <span class="admin-links admin-icon">
        <a href="<?= $note['favourite-toggle-href'] ?>" class="nu e2-admin-item <?= ($note['favourite?']? 'e2-admin-item_on' : '') ?>" data-e2-js-action="toggle-favourite">
          <span class="e2-svgi">
            <span class="e2-toggle-state-off"><?= _SVG ('favourite-off') ?></span>
            <span class="e2-toggle-state-on"><?= _SVG ('favourite-on') ?></span>
            <span class="e2-toggle-state-thinking"><?= _SVG ('spin') ?></span>
          </span>
        </a>
      </span>
    <?php } ?>

    <span class="admin-icon">
      <a href="<?= $note['edit-href'] ?>" class="nu <?php if (array_key_exists ('only', $content['notes'])) {?>e2-edit-link<?php } ?>">
        <span class="e2-svgi"><?= _SVG ('edit') ?><span class="e2-unsaved-led" style="display: none"></span></span>
      </a>
    </span>
    
  </span>
<?php endif ?>
<?php endif ?>


<?php if (empty ($note['_pubpreview'])): ?>
<?php if ($note['scheduled?']) { ?><div class="e2-nonpublic-label"><?= _S ('gs--will-be-published') ?> <?=_DT ('j {month-g} Y, H:i', @$note['time'])?></div><?php } ?>
<?php endif ?>

<?php // TITLE // ?>
<h1>
<?php if (@$note['favourite?'] ) { ?>
<?= _A ('<a href="'. $note['href']. '"><span class="e2-note-favourite-title">'. $note['title']. '</span></a>') ?> 
<?php } else { ?>
<?= _A ('<a href="'. $note['href']. '">'. $note['title']. '</a>') ?> 
<?php } ?>
</h1>

</div>


<?php // TEXT // ?>

<?php if (array_key_exists ('snippet-text', $note) and $note['snippet-text'] != '') { ?>
<div class="e2-note-snippet-text">
<p><?= $note['snippet-text'] ?></p>
</div>
<?php } ?>


<?php // META: COMMENTS, READS, DATE, TAGS // ?>

<?php if (empty ($note['_pubpreview'])): ?>

<div class="e2-note-meta">
<?php if ($note['comments-link?']): ?>
<?php if ($note['comments-count']) { ?><a href="<?= $note['href-comments'] ?>" class="nu"><span class="e2-svgi"><?= _SVG ('comments') ?></span> <u><?= $note['comments-count-text'] ?></u></a><?php if ($note['new-comments-count'] == 1 and $note['comments-count'] == 1) { ?>, <?= _S ('gs--comments-all-one-new') ?><?php } elseif ($note['new-comments-count'] == $note['comments-count']) { ?>, <?= _S ('gs--comments-all-new') ?><?php } elseif ($note['new-comments-count']) { ?> · <span class="admin-links"><a href="<?=$note['href']?>#new"><?= $note['new-comments-count-text'] ?></a></span>
<?php } ?>
<?php } else { ?>
<a href="<?= $note['href-comments'] ?>" class="nu"><span class="e2-svgi"><?= _SVG ('comments') ?></span> <u><?= _S ('gs--no-comments') ?></u></a>
<?php } ?> &nbsp;
<?php endif ?>

<?php if (!empty ($note['preview-href'])) { ?>
<span class="admin-links"><a href="<?= $note['preview-href'] ?>"><?= _S ('gs--secret-link') ?></a></span> &nbsp;
<?php } ?>

<?php if (_READS ($note)) { ?><span><span class="e2-svgi"><?= _SVG ('read') ?></span> <?= _READS ($note) ?></span> &nbsp;<?php } ?>

<?php if (!empty ($note['time'])) { ?>
<span title="<?=_DT ('j {month-g} Y, H:i, {zone}', @$note['time'])?>"><?= _AGO ($note['time']) ?></span> &nbsp;
<?php } ?>

<?php
$tags = array ();
foreach ($note['tags'] as $tag) {

  $classname = 'e2-tag'. ($tag['visible?']? '' : ' e2-tag-hidden');
  if ($tag['current?']) {
    $tags[] = '<mark><span class="'. $classname .'">'. $tag['name'] .'</span></mark>';
  } else {
    $tags[] = (
      '<a href="'. $tag['href'] .'" '.
      'class="'. $classname .'">'.
      $tag['name'] .
      '</a>'
    );
  }
}
echo implode (' &nbsp; ', $tags);

// if (!empty ($note['search-result-provider'])) {
//   echo '&nbsp; @'. $note['search-result-provider'];
// }

?>
</div>
<?php endif; ?>

</div>