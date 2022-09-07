<?php $notes = $content['_']['_notes_gallery']; ?>
<?php unset ($content['_']['_notes_gallery']); ?>
<?php if (!count ($notes)) return; ?>

<?php $areas = _FIT ($notes['each'], $notes['seed']); ?>

<?php

if (!$areas or !count ($areas['areas'])) return;

$e2_notes_gallery_additional_class = '';
if (@$areas['grid-rows'] == 2) $e2_notes_gallery_additional_class = 'e2-notes-gallery-2-rows';
if (@$areas['grid-rows'] == 3) $e2_notes_gallery_additional_class = 'e2-notes-gallery-3-rows';

?>

<?php if ($areas['debugging?']) { ?>
<div class="e2-error" style="font-size: 9pt"><b>grid-rows is <?= $areas['grid-rows'] ?></b></div>
<?php } ?>

<div class="e2-notes-gallery <?= $e2_notes_gallery_additional_class ?>">

<?php foreach ($areas['areas'] as $area) { ?>

  <?php

    $area_class = 'e2-notes-gallery-area';
    if ($area['has-vertical-rule?']) $area_class .= ' e2-notes-gallery-area-vrule';
    if ($area['has-horizontal-rule?']) $area_class .= ' e2-notes-gallery-area-hrule';

    $area_style = 'grid-area: ' . $area['grid-area'];

  ?>

  <div class="<?= $area_class ?>" style="<?= $area_style ?>">

  <?php if ($areas['debugging?']) { ?>
  <div class="e2-error" style="font-size: 9pt"><b>area #<?= $area['index'] ?>:</b> <?= $area['debug-descriptors-list']; ?></div>
  <?php } ?>
  
  <?php foreach ($area['items'] as $item) { ?>

  <?php

    $title_class = '';
    if ($item['has-large-title?']) $title_class = ' e2-notes-gallery-item-title-large';
    if ($item['has-jumbo-title?']) $title_class = ' e2-notes-gallery-item-title-jumbo';

    if ($item['has-side-image?']) {
      if ($item['has-large-left-image?']) {
        $item_class_maybe = ' e2-notes-gallery-item-sided-l';
      } elseif ($item['has-large-right-image?']) {
        $item_class_maybe = ' e2-notes-gallery-item-sided-r';
      }
    } else {
      $item_class_maybe = '';
      $item_image_style_maybe = '';
    }

    if ($item['has-large-title?'] or $item['has-jumbo-title?']) {
      $item_class_maybe .= ' e2-notes-gallery-item-with-large-title';
    }

    if ($areas['debugging?']) {
      echo '<div class="e2-error" style="font-size: 9pt"><b>item #'. $item['index'] .':</b> '. $item['debug-descriptor'] .' — '. $item['debug-selectedness'] .'</div>';
    }

    $note = $item['note'];
    $winning_image_k = $item['note-image-index'];

    $image = ($item['has-large-image?'] ? $note['images'][$winning_image_k] : $note['thumbs'][$winning_image_k]);
    
    $image_style = (
      $item['has-large-image?'] ?
      'style="padding-bottom: '. round ($image['verticality'] * 100, 2) .'%"' : ''
    );

  ?>

  <div class="e2-notes-gallery-item <?= $item_class_maybe ?>">

    <?php if ($item['has-image?']) { ?>
    <a href="<?= $note['href'] ?>" class="e2-notes-gallery-image nu" <?= $item_image_style_maybe ?>>
    <div class="<?= ($item['has-large-image?'] ? ' e2-notes-gallery-cover' : ' e2-notes-gallery-thumb') ?>" <?= $image_style?>><img src="<?= $image['src'] ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>" /></div>
    </a>
    <?php } ?>

    <div class="e2-notes-gallery-text">

      <div class="e2-notes-gallery-item-title <?= $title_class ?>"><a href="<?= $note['href'] ?>" title="<?=_DT ('j {month-g} Y, H:i', $note['time'])?>"><?= $note['title'] ?></a></div>

      <?php if ($item['has-summary?']) { ?>
      <div class="e2-notes-gallery-item-summary"><?= $note['snippet-text'] ?></div>
      <?php } ?>

      <div class="e2-notes-gallery-item-meta">
        
        <?php if ($note['comments-count']) { ?><span><span class="e2-svgi"><?= _SVG ('comments') ?></span> <?= $note['comments-count'] ?></span> &nbsp; <?php } ?>
        
        <?php if (_READS ($note)) { ?><span><span class="e2-svgi"><?= _SVG ('read') ?></span> <?= _READS ($note) ?></span> &nbsp;<?php } ?>
        
        <span title="<?=_DT ('j {month-g} Y, H:i, {zone}', $note['time'])?>"><?= _AGO ($note['time']) ?></span>

      </div>

    </div>
  </div>

  <?php } ?>
  </div>

<?php } ?>

</div>