<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?= $content['title'] ?></title>

<base href="<?= $content['meta']['base-href'] ?>" />

<link rel="shortcut icon" type="<?= $content['meta']['favicon-type'] ?>" href="<?= $content['meta']['favicon-href'] ?>" />

<?php if (array_key_exists ('apple-touch-icon-href', $content['meta'])): ?>
<link rel="apple-touch-icon" href="<?= $content['meta']['apple-touch-icon-href'] ?>">
<?php endif ?>

<?php foreach ($content['meta']['stylesheets'] as $stylesheet): ?>
<link rel="stylesheet" type="text/css" href="<?= $stylesheet ?>" />
<?php endforeach ?>

<?php foreach ($content['meta']['newsfeeds'] as $newsfeed): ?>
<link rel="alternate" type="<?= $newsfeed['type'] ?>" title="<?= $newsfeed['title'] ?>" href="<?= $newsfeed['href'] ?>" />
<?php endforeach ?>

<?php foreach ($content['meta']['navigation-links'] as $link): ?>
<link rel="<?= $link['rel'] ?>" id="<?= $link['id'] ?>" href="<?= $link['href'] ?>" />
<?php endforeach ?>

<?php if (array_key_exists ('manifest-href', $content['meta'])): ?>
<link rel="manifest" href="<?= $content['meta']['manifest-href'] ?>">
<?php endif ?>

<?php if (array_key_exists ('robots', $content['meta'])): ?>
<meta name="robots" content="<?= $content['meta']['robots'] ?>" />
<?php endif ?>

<?php if (array_key_exists ('summary', $content)): ?>
<meta name="description" content="<?= $content['summary'] ?>" />
<meta name="og:description" content="<?= $content['summary'] ?>" />
<?php endif ?>

<meta name="viewport" content="<?= $content['meta']['viewport'] ?>">

<meta property="og:type" content="website" />
<meta property="og:title" content="<?= $content['title'] ?>" />
<meta property="og:url" content="<?= $content['meta']['current-href'] ?>" />

<?php foreach ($content['meta']['og-images'] as $image): ?>
<meta property="og:image" content="<?= $image ?>" />
<?php endforeach ?>

<meta name="twitter:card" content="<?= $content['meta']['twitter-card'] ?>" />

<?php _X ('head-extras') ?>

