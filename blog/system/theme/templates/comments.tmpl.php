<?php if ($content['class'] == 'note') { ?>
  <a name="comments"></a>
<?php } ?>



<?php if (array_key_exists ('comments', $content)) { ?>
  <?php if ($content['class'] != 'comment-edit') { ?>
    <?php if (array_key_exists ('each', $content['comments'])) { ?>
      <div class="e2-comments <?= $content['notes']['only']['hidden?']? 'e2-comments-hidden' : '' ?>">
        <?php if (!array_key_exists ('only', $content['comments']['each'])) { ?>
          <?php _T ('comments-heading'); ?>
        <?php } ?>

        <?php foreach ($content['comments']['each'] as $comment): ?>
        <?php $content['_']['_comment'] = $comment; ?>
        <?php _T ('comment') ?>
        <?php endforeach ?>
      </div>

    <?php } ?>
  <?php  } ?>
<?php } ?>



<?php if (array_key_exists ('toggle', $content['comments'])) { ?>
  <div class="e2-comments-toggle">
    <a class="e2-button" href="<?=$content['comments']['toggle']['href']?>"><?= $content['comments']['toggle']['text'] ?></a>
  </div>
<?php } ?>



<?php if ($content['comments']['display-form?']) { ?>
  <?php _T_FOR ('form-comment') ?>
<?php } ?>
