<!DOCTYPE html>
<html>

<!-- <?= $content['exception-message'] ?> -->

<head>
<title><?= $content['title'] ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta charset="utf-8"/>
<style type="text/css">

  html, body { height: 100%; margin: 0; padding: 0 }
  pre { font-size: 14px; line-height: 18px }
  .e2-logo-svg { width: 32px; height: 32px; fill: #ccc }

  /* Next lines must be the same as in e2-unavailable.scss */
  .e2-unavailable { display: table; width: 100%; height: 100% }
  .e2-unavailable>div { display: table-cell; width: 100%; vertical-align: middle }
  .e2-unavailable .e2-logo-svg { width: 160px; height: 160px; margin: auto }

  .e2-logo-svg {
    animation-duration: .67s; animation-fill-mode: both; animation-timing-function: ease-out;
    animation-name: bounceIn;
  }

  @keyframes bounceIn {
    0% { opacity: 0;transform: scale(.3); }
    100% { transform: scale(1);}
  }

</style>
</head>
<body>

  <?php if (array_key_exists ('exception-string', $content)) { ?>
    <pre><?= $content['exception-string'] ?> </pre>
    <div class="e2-logo-svg"><?= _SVG ('aegea') ?></div>
  <?php } else { ?>
    <div class="e2-unavailable"><div><div class="e2-logo-svg"><?= _SVG ('aegea') ?></div></div></div>
  <?php } ?>

</body>

</html>
