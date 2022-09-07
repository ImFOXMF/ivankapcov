<?php if (array_key_exists ('sources', $content)) { ?>

<table>

<style>td { vertical-align: top; padding-bottom: .6em }</style>

<?php foreach ($content['sources'] as $source) { ?>

  <tr style="
    <?php if (!$source['true?']) { ?>
    color: #ccc;
    <?php } elseif (!$source['whitelisted?'] and !$source['trusted?']) { ?>
    color: #c00;
    text-decoration: line-through;
    <?php } elseif ($source['whitelisted?'] and $source['trusted?']) { ?>
    color: #090;
    <?php } ?>
    "
  >
  <td style="padding-right: 10px"><?= $source['id'] ?></td>
  <td style="padding-right: 10px"><a href="<?= $source['href'] ?>" class="nu"><img src="<?= $source['userpic-href'] ?>" width="32" height="32" style="border-radius: 50%; vertical-align: top; margin-top: 4px" /></a></td>
  <td style="padding-right: 10px"><?= $source['title'] ?><br />by <?= $source['author'] ?></td>
  <td style="padding-right: 10px"><?= $source['href-display'] ?></td>
  <td style="padding-right: 10px"><?= $source['href-filtered'] ?></td>

  <td>
  <nobr>
  <?php if (array_key_exists ('premoderate-url', $source)) { ?>
  <a class="e2-button" href="<?= $source['premoderate-url'] ?>">Pre</a>   
  <?php } ?>
  <?php if (array_key_exists ('trust-url', $source)) { ?>
  <a class="e2-button" href="<?= $source['trust-url'] ?>">Trust+</a>   
  <?php } ?>
  <?php if (array_key_exists ('ban-url', $source)) { ?>
  <a class="e2-button" href="<?= $source['ban-url'] ?>">Ban+</a>   
  <?php } ?>
  <?php if (array_key_exists ('ban-url', $source)) { ?>
  <a class="e2-button" href="<?= $source['forget-url'] ?>">×</a>   
  <?php } ?>
  </nobr>
  </td>
  
  </tr>

<?php } ?>

</table>

<?php } ?>
