<?php if (array_key_exists ('tags', $content)) { ?>
<?php if ($content['class'] == 'tags') { ?>

<div class="e2-tags">
<?php foreach ($content['tags']['each'] as $tag): ?>
<?php if (!$tag['visible?']) continue; ?>
<a
  href="<?=@$tag['href']?>"
  class="e2-tag"
  style="opacity: <?= 0.3 + 0.7 * pow ($tag['weight'], 0.7) ?>"
><?=@$tag['tag']?></a>
<?php endforeach ?>
</div>

<?php } ?>
<?php } ?>
