<?php // mui ?>

<a id="e2-check-password-action" href="<?= $content['form-login']['form-check-password-action'] ?>"></a>
  
<div
  class="
    e2-login-sheet
    <?php if (!$content['sign-in']['necessary?']) { ?>e2-hideable<?php } ?>
    <?= $content['sign-in']['necessary?']? 'e2-show' : '' ?>
  "
  id="e2-login-sheet"
  <?php //= $content['sign-in']['necessary?']? '' : 'style="visibility: hidden"' ?>
>

<div class="e2-login-window" id="e2-login-window">
  <div class="e2-login-window-col">
    <form
      action="<?= $content['form-login']['form-action'] ?>"
      method="post"
      class="form-login e2-enterable"
      id="form-login"
    >

      <input type="text" name="login" value="<?= $content['form-login']['login-name'] ?>" style="display: none" />

      <?php if (array_key_exists ('prompt', $content['sign-in'])) { ?>
        <!-- <h1><?= $content['sign-in']['prompt'] ?></h1> -->
        <h2><?= _S ('gs--need-password') ?></h2>
      <?php } ?>
      <?php if ($content['sign-in']['necessary?']): ?>
          <!--
          <p><?= _A ('<a href="'. $content['blog']['href']. '">'. _S ('gs--frontpage') .'</a>') ?></p>
          -->
      <?php endif ?>

      <div class="e2-login-window-input-wrapper">
        <span class="e2-login-window-icon"><?= _SVG ('lock') ?></span>
        <input type="password" name="password" id="e2-password" class="text big input-disableable e2-login-window-input e2-login-window-password" autofocus="autofocus"/>
      </div>
        
      <label><a href="<?= $content['form-login']['reset-href'] ?>"><?= _S ('gs--i-forgot') ?></a></label>

      <label><input type="checkbox"
        class="checkbox input-disableable"
        name="is_public_pc"
        id="is_public_pc"
        <?= $content['form-login']['public-pc?']? ' checked="checked"' : '' ?>
      />&nbsp;<?= _S ('ff--public-computer') ?></label>

      <div class="e2-login-window-button">
        <button type="submit" id="login-button" class="e2-button e2-submit-button input-disableable">
          <?= _S ('fb--sign-in') ?>
        </button>
        &nbsp;&nbsp;&nbsp;
        <span class="e2-svgi e2-login-window-password-checking" style="display: none"><?= _SVG ('spin') ?></span><span id="password-correct" class="e2-svgi" style="display: none"><?= _SVG ('tick') ?></span>
      </div>
    </form>
  </div>
</div>

</div>