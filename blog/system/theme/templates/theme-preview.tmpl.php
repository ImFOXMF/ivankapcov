<?php if (array_key_exists ('theme-preview', $content)) { ?> 

<?php if (count (@$content['theme-preview']['templates']) > 1) { ?>    

<!-- <div class="form-control">
<?= $content['theme-preview']['themes-before'] ?>
</div>

<div class="e2-heading-description e2-text">
<?= $content['theme-preview']['themes-after'] ?>
</div> -->

<?php } else { ?>

<div class="e2-heading-description e2-text">
<?= $content['theme-preview']['no-themes'] ?>
</div>

<?php } ?>

<?php } ?>