<!DOCTYPE html>
<html lang="<?= $content['language'] ?>">

<head>

<?php _LIB ('jquery') ?>

<?php _T_DEFER ('head') ?>
<?php _T ('init-script') ?>
<?php _T_DEFER ('scripts') ?>

<?= @$content['embed']['pre-head-end'] ?>

</head>

<body
  <?php if (@$content['template']['respond-to-dark-mode?']) { ?>
    class="e2-responds-to-dark-mode"
  <?php } ?>
>

<?php _T_FOR ('rose-debug-info') ?>

<?php _T_FOR ('form-install') ?>
<?php _T_FOR ('form-login') ?>

<?php if (@$content['blog']['show-subscribe-button?']) { ?>
<?php _X ('subscribe-sheet') ?>
<?php } ?>

<?php if ($content['engine']['installed?']) { ?>
<?php _T ('layout'); ?>
<?php } ?>

<?= @$content['embed']['pre-body-end'] ?>

</body>

<?php _CSS ('main') ?>
<?php _JS ('main') ?>

<?php if ($content['sign-in']['done?']) { ?>
<?php _CSS ('admin') ?>
<?php _JS ('admin') ?>
<?php } ?>

<?php _CSS ('overrides') ?>

</html>

<!-- <?=$content['engine']['version-description']?> -->
