<?php if (!$content['sign-in']['done?'] and !$content['sign-in']['necessary?']) { ?>
<a class="e2-visual-login nu" id="e2-visual-login" href="<?= $content['sign-in']['href'] ?>"><span class="e2-admin-link e2-svgi"><?= _SVG ('lock') ?></span></a>
<?php } ?>