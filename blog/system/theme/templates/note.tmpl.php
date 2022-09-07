<?php $note = $content['_']['_note']; ?>
<?php unset ($content['_']['_note']); ?>

<?php _X ('note-pre') ?>

<div
  class="e2-note <?= $note['hidden?']? 'e2-note-hidden' : '' ?> <?= $note['favourite?']? 'e2-note-favourite' : '' ?>"
  data-note-id="<?= $note['id'] ?>"
  <?php if (!empty ($note['read-href'])) { ?>
  data-note-read-href="<?= $note['read-href'] ?>"
  <?php } ?>
>

<?php if (array_key_exists ('edit-href', $note)): ?>
  <span class="admin-links-floating admin-links-sticky">
  
    <?php if ($content['sign-in']['done?'] and array_key_exists ('source', $note)) { ?>
    <span class="admin-icon">
      <div class="e2-popup-menu" style="position: relative; top: -8px; left: -12px; width: 16px; height: 16px; display: inline-block;">
        <button type="button" class="e2-popup-menu-button">
          <span class="e2-popup-menu-button-icon"><span class="e2-svgi"><?= _SVG ('chevron-down') ?></span></span>
          <span class="e2-popup-menu-button-text"><?= _S ('ab--menu-actions') ?></span>
        </button>

        <div class="e2-popup-menu-widget">

          <?php if (array_key_exists ('source-premoderate-url', $note)) { ?>
            <a href="<?= $note['author-href'] ?>" class="nu e2-popup-menu-widget-item">
              <span class="e2-popup-menu-widget-item-icon">
                <span class="e2-svgi"><?= _SVG ('aegea') ?></span>
              </span>
              <span class="e2-popup-menu-widget-item-text">
                <?= $note['source'] ?><br />
                by <?= $note['author'] ?>
              </span>
            </a> 
          <?php } ?> 

          <div class="e2-popup-menu-widget-item e2-popup-menu-widget-item_info">
            <span class="e2-popup-menu-widget-item-text">
              Source ID: <?= $note['source-id'] ?> → <?= $note['source-true-id'] ?><br />
            </span>
          </div>

          <div class="e2-popup-menu-widget-item e2-popup-menu-widget-item_info">
            <span class="e2-popup-menu-widget-item-icon">
              <span class="e2-svgi"><?= _SVG ('tick') ?></span>
            </span>
            <span class="e2-popup-menu-widget-item-text">
              <?= $note['source-whitelisted?']? '':'Not ' ?>Whitelisted,<br />
              <?= $note['source-trusted?']? '':'Not ' ?>Trusted
            </span>
          </div>

          <hr class="e2-popup-menu-widget-separator">

          <?php if (array_key_exists ('source-premoderate-url', $note)) { ?>
            <a href="<?= $note['source-premoderate-url'] ?>" class="nu e2-popup-menu-widget-item">
              <span class="e2-popup-menu-widget-item-text">Premoderate</span>
            </a> 
          <?php } ?>

          <?php if (array_key_exists ('source-trust-url', $note)) { ?>
            <a href="<?= $note['source-trust-url'] ?>" class="nu e2-popup-menu-widget-item">
              <span class="e2-popup-menu-widget-item-text">Trust and publish all</span>
            </a>
          <?php } ?>

          <?php if (array_key_exists ('source-ban-url', $note)) { ?>
            <a href="<?= $note['source-ban-url'] ?>" class="nu e2-popup-menu-widget-item e2-popup-menu-widget-item_remove">
              <span class="e2-popup-menu-widget-item-text">Ban and delete all</span>
            </a>
          <?php } ?>

          <?php if (array_key_exists ('source-forget-url', $note)) { ?>
            <a href="<?= $note['source-forget-url'] ?>" class="nu e2-popup-menu-widget-item e2-popup-menu-widget-item_remove">
              <span class="e2-popup-menu-widget-item-icon">
                <span class="e2-svgi"><?= _SVG ('trash') ?></span>
              </span>
              <span class="e2-popup-menu-widget-item-text">Forget</span>
            </a>
          <?php } ?>

        </div>

      </div>
    </span>
    <?php } ?>

    <?php if (array_key_exists ('favourite-toggle-href', $note)) { ?>
     <span class="admin-icon">
        <a href="<?= $note['favourite-toggle-href'] ?>" class="nu e2-admin-link e2-admin-item <?= ($note['favourite?']? 'e2-admin-item_on' : '') ?>" data-e2-js-action="toggle-favourite">
          <span class="e2-svgi">
            <span class="e2-toggle-state-off"><?= _SVG ('favourite-off') ?></span>
            <span class="e2-toggle-state-on"><?= _SVG ('favourite-on') ?></span>
            <span class="e2-toggle-state-thinking"><?= _SVG ('spin') ?></span>
          </span>
        </a>
      </span>
    <?php } ?>

    <span class="admin-icon">
      <a href="<?= $note['edit-href'] ?>" class="nu e2-admin-link <?php if (array_key_exists ('only', $content['notes'])) {?>e2-edit-link<?php } ?>">
        <span class="e2-svgi"><?= _SVG ('edit') ?><span class="e2-unsaved-led" style="display: none"></span></span>
      </a>
    </span>
    
  </span>
<?php endif ?>


<article>

<?php if (@$note['userpic-href']) { ?>
<div class="e2-note-author-picture">
  <img src="<?= $note['userpic-href'] ?>" alt="<?= @$note['source'] ?>" />
</div>
<?php } ?>

<?php if (@$note['author']) { ?>
<div class="e2-note-author-name">
<?= @$note['author'] ?>
</div>
<?php } ?>

<?php if ($note['draft?']) { ?><div class="e2-nonpublic-label"><?= _S ('gs--not-published') ?></div><?php } ?>
<?php if ($note['scheduled?']) { ?><div class="e2-nonpublic-label"><?= _S ('gs--will-be-published') ?> <?=_DT ('j {month-g} Y, H:i', @$note['time'])?></div><?php } ?>

<?php // TITLE // ?>
<h1 class="e2-smart-title">
<?php if (@$note['favourite?'] and !$content['sign-in']['done?']) { ?>
<?= _A ('<a href="'. $note['href']. '"><span class="e2-note-favourite-title">'. $note['title']. '</span></a>') ?> 
<?php } else { ?>
<?= _A ('<a href="'. $note['href']. '">'. $note['title']. '</a>') ?> 
<?php } ?>
</h1>



<?php // TEXT // ?>

<?php if (array_key_exists ('text', $note) and $note['text'] != '') { ?>
<div class="e2-note-text e2-text">
<?= $note['text'] ?>
</div>
<?php } ?>

</article>

<?php // LIKES // ?>

<?php if (array_key_exists ('only', $content['notes'])) { ?>
<?php if (is_array ($note['sharing-buttons'])) { ?>
<?php if (count ($note['sharing-buttons'])) { ?>

<div class="e2-note-likes">

<?php if (@$content['blog']['show-subscribe-button?']) { ?>
<a id="e2-note-subscribe-button" class="e2-note-subscribe-button" href="<?= @$content['blog']['rss-href'] ?>" ><?= _S ('gs--subscribe-to-blog') ?></a>
<?php } ?>

<?php _LIB ('likely') ?>

<div class="likely <?= $content['template']['use-likely-light?']? 'likely-light':'' ?>" data-url="<?= $note['href-original'] ?>" data-title="<?= strip_tags ($note['title']) ?>">

<?php foreach ($note['sharing-buttons'] as $network => $network_info) { ?>
<?php if ($network_info['share?']) { ?>
<?php
  $additional = '';
  if ($network_info['data']) {
    foreach ($network_info['data'] as $k => $v) {
      $additional .= ' data-'. $k .'="'. $v .'"';
    }
  }
?>

<div class="<?= $network ?>" <?= $additional ?>><?= _S ('sn--'. $network .'-verb') ?></div>

<?php } ?>
<?php } ?>

</div>

</div>

<?php } ?>
<?php } ?>
<?php } ?>




<?php // LIST OF KEYWORDS // ?>

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
<span title="<?=_DT ('j {month-g} Y, H:i, {zone}', $note['time'])?>"><?= _AGO ($note['time']) ?></span> &nbsp;
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

?>
</div>


</div>


<?php if (array_key_exists ('only', $content['notes'])) { ?>
<?php if (!empty ($note['show-href'])): ?>
<div class="e2-note-visibility-toggle">
<form action="<?= $note['show-href'] ?>" method="post"><button type="submit" class="e2-button"><?= _S ('fb--show') ?></button></form>
</div>
<?php endif ?>
<?php } ?>



<?php $content['_']['_notes_gallery'] = $note['related']; ?>

<?php if (!empty ($note['related']) and $content['class'] == 'note') { ?>

<section>
<div class="e2-section-heading"><?= $note['related']['title']?></div>
<?php _T ('notes-gallery') ?>
</section>

<?php } elseif ($content['class'] == 'frontpage') { ?>

<section>
<div class="e2-note-splitter">
<?php _T ('notes-gallery') ?>
</div>
</section>

<?php } ?>

<?php _X ('note-post') ?>
