<?php // mui

if (
  array_key_exists ('admin', $content) and (
    array_key_exists ('new-note-href', $content['admin']) or
    array_key_exists ('drafts-href', $content['admin'])
  )
):

?>

<span class="admin-menu admin-links" id="e2-author-menu">

  <?php # COMMENTS # ?>
  <?php if (array_key_exists ('new-comments-href', $content['admin'])) { ?>
  <span class="admin-icon admin-menu-comments">
    <a class="nu admin-menu-comments-count" href="<?= @$content['admin']['new-comments-href'] ?>#new"><?= (int) $content['admin']['new-comments-count'] ?></a>
  </span>
  <?php } ?>


  <?php # NEW # ?>
  <?php if (array_key_exists ('new-note-href', $content['admin'])) { ?>

  <?php if (_AT ($content['admin']['new-note-href'])) { ?>
  <span class="admin-icon e2-admin-menu-new-selected" title="<?= _S ('ln--new-post') ?>"><span class="e2-svgi"><?= _SVG ('new') ?></span></span>

  <span class="admin-icon e2-admin-menu-new" style="display: none" title="<?= _S ('ln--new-post') ?>"><a href="<?= $content['admin']['new-note-href'] ?>" class="nu"><span class="e2-svgi"><?= _SVG ('new') ?></span></a></span>

  <?php } else { ?>

  <span class="admin-icon e2-new-note-item" title="<?= _S ('ln--new-post') ?>" id="e2-new-note-item"><a href="<?= $content['admin']['new-note-href'] ?>" class="nu"><span class="e2-svgi"><?= _SVG ('new') ?><span class="e2-unsaved-led" style="display: none"></span></span></a></span>

  <?php } ?>
  <?php } ?>
  

  <?php # DRAFTS # ?>
  <?php if (array_key_exists ('drafts-href', $content['admin'])) { ?>

  <span class="admin-icon" id="e2-drafts-item"
     <?= ((
       array_key_exists ('drafts-count', $content['admin']) and
       $content['admin']['drafts-count'] > 0
     )? '' : ' style="display: none"') ?>
  >
    <span id="e2-drafts" title="<?= _S ('ln--drafts') ?> (<?= $content['admin']['drafts-count'] ?>)">
      <?=
        _A (
          '<a href="'. $content['admin']['drafts-href'] .'" class="nu"><span class="e2-svgi">'.
          _SVG ('drafts').
          '<span class="e2-unsaved-led" style="display: none"></span></span></a>'
        )
      ?>
    </span>
  </span>

  <?php } ?>


  <?php # SETTINGS # ?>
  <?php if (array_key_exists ('settings-href', $content['admin'])) { ?>
    <span class="admin-icon">
    <?=
      _A (
        '<a href="'. $content['admin']['settings-href'] .'" class="nu"><span class="e2-svgi">'.
        _SVG ('settings').
        '</span></a>'
      )
    ?>
    </span>
  <?php } ?>


</span>

<?php endif ?>
