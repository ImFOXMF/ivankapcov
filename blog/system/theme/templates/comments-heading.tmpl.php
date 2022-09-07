<?php // mui ?>

<?php if ($content['comments']['count']) { ?>
<?php #if (array_key_exists ('comments', $content)) { ?>

<div class="e2-section-heading">

<span id="e2-comments-count"><?= $content['comments']['count-text'] ?></span><?php if ($content['comments']['new-count'] == 1 and $content['comments']['count'] == 1) { ?>, <?= _S ('gs--comments-all-one-new') ?><?php } elseif ($content['comments']['new-count'] == $content['comments']['count']) { ?>, <?= _S ('gs--comments-all-new') ?><?php } elseif ($content['comments']['new-count']) { ?> · <span class="admin-links"><a href="<?=$content['notes']['only']['href']?>#new" class="e2-pseudolink"><?= $content['comments']['new-count-text'] ?></a></span>
<?php } ?>

</div>

<?php } ?>