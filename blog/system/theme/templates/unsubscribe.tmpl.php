<?php if (array_key_exists ('unsubscribe', $content)) { ?>

<?php if ($content['unsubscribe']['success?']) { ?>

<p><?= _S ('gs--you-are-no-longer-subscribed') ?> <a href="<?= $content['unsubscribe']['note-href'] ?>"><?= $content['unsubscribe']['note-title'] ?></a>.</p>

<?php } else { ?>

<p><?= $content['unsubscribe']['error-message'] ?>.</p>

<?php } ?>

<?php } ?>