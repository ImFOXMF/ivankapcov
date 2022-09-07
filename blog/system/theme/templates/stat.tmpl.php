<?php if ($content['stat']['show?']) { ?>
&nbsp;&nbsp;&nbsp;
<span title="<?= _S ('gs--pgt') ?>"><?=$content['stat']['generation-time']?> <?= _S ('gs--seconds-contraction') ?> · <?=$content['stat']['db-query-count']?> · <?=$content['stat']['peak-memory-mb']?> MB</span>
<?php } ?>