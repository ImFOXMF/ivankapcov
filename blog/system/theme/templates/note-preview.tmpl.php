<?php $note = $content['_']['_note']; ?>
<?php unset ($content['_']['_note']); ?>

<div class="e2-draft-preview" id="e2-draft-<?= $note['id'] ?>">
<a href="<?= $note['href'] ?>" class="e2-admin-link nu">
  <div class="e2-draft-preview-box">
    <span class="e2-unsaved-led" style="display: none"></span>
    <div class="e2-draft-preview-content">
    <?php if ($thumb = $note['thumbs'][0] and $thumb['is-available?']) { ?>
      <img src="<?= $thumb['src']?>" width="<?= $thumb['width'] * 10/9 ?>" height="<?= $thumb['height'] * 10/9 ?>" alt="" />
    <?php } ?>

    <?php if (array_key_exists ('userpic-href', $note)) { ?>
    <div class="e2-draft-preview-author-picture">
      <img src="<?= $note['userpic-href'] ?>" alt="<?= @$note['source'] ?>" />
    </div>
    <?php } ?>
  
    <div class="e2-draft-preview-text">
      <?php if (array_key_exists ('author', $note)) { ?>
      <b><?= @$note['author'] ?></b><br />
      <?php } ?>
      <?= $note['summary']?>
    </div>
    </div>
  </div>
  <u><?= $note['title']?></u>
</a>
</div>
