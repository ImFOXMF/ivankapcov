<?php if ($content['class'] == 'frontpage' or $content['class'] == 'tag' or $content['class'] == 'themepreview') { ?> 

<?php if (count ($content['tags']['menu-each'])) { ?> 

<div class="e2-tags">
<?php foreach ($content['tags']['menu-each'] as $tag): ?>
<?php if (!$tag['visible?']) continue; ?>
<?php if ($tag['current?']) { ?>
<?php if ($tag['pinnable?']) { ?>
<span style="white-space: nowrap"><span class="e2-tag"><?=@$tag['tag']?> <a href="<?=$tag['pinned-toggle-href']?>" class="e2-admin-link nu e2-admin-item <?= ($tag['pinned?']? 'e2-admin-item_on' : '') ?>" data-e2-js-action="toggle-pinned"><span class="e2-svgi"><span class="e2-toggle-state-off"><?= _SVG ('pinned-off') ?></span><span class="e2-toggle-state-on"><?= _SVG ('pinned-on') ?></span><span class="e2-toggle-state-thinking"><?= _SVG ('spin') ?></span></span></span></a></span>
<?php } ?>
<?php } else { ?>
<a href="<?=@$tag['href']?>" class="e2-tag"><?=@$tag['tag']?></a>
<?php } ?>
<?php endforeach ?>
</div>

<?php } ?>

<?php } ?>