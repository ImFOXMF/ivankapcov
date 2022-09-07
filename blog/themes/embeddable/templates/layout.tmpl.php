<div style="float: right">
<?php _T ('author-menu') ?>
</div>

<div><?php _T ('user-picture') ?></div>

<div style="float: right">
<?php if ($content['class'] != 'found') { ?>
  <?php _T_FOR ('form-search') ?>
<?php } ?>
</div>

<h1><?= _A ('<a href="'. $content['blog']['href']. '"><span id="e2-blog-title">'. $content['blog']['title']. '</span></a>') ?></h1>


<?php if ($content['class'] == 'frontpage') { ?>
<div id="e2-blog-description"><?= $content['blog']['subtitle'] ?></div>
<?php } ?>

<?php _T ('heading') ?>
<?php _T ('theme-preview') ?>
<?php _T ('message') ?>
<?php _T ('welcome') ?>
<?php _T ('notes') ?>
<?php _T ('notes-list') ?>
<?php _T ('tags') ?>
<?php _T ('nothing') ?>
<?php _T ('sessions') ?>
<?php _T ('pages') ?>
<?php _T ('comments') ?>
<?php _T ('popular') ?>
<?php _T ('tags-menu') ?>
<?php _T ('unsubscribe') ?>
<?php _T ('form') ?>

© <span id="e2-blog-author"><?= @$content['blog']['author'] ?></span>, <?=$content['blog']['years-range']?>

<a class="e2-rss-button" href="<?=@$content['blog']['rss-href']?>"><?= _S ('gs--rss') ?></a>

<?= $content['engine']['about'] # please do not remove ?>
<?php _T_DEFER ('stat') ?>
<?php _T ('login-element'); ?>

<?php _T ('niceerror'); ?>
