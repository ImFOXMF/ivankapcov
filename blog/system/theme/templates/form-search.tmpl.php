<form
  id="e2-search"
  class="search-field search-field-right-anchored e2-enterable"
  action="<?= @$content['form-search']['form-action'] ?>"
  method="post"
  accept-charset="utf-8"
>
  <label class="search-field__label">
    <input class="search-field__input" type="search" inputmode="search" name="query" id="query" value="<?= @$content['form-search']['query'] ?>" />
    
    <span class="search-field__zoom-icon"><?= _SVG ('loupe') ?></span>
    
    <?php if (array_key_exists ('href', $content['tags']) and !_AT ($content['tags']['href'])) { ?>
      <a class="nu search-field__tags-icon" href="<?= $content['tags']['href'] ?>" title="<?= _S ('gs--tags') ?>">
        <span class="e2-svgi"><?= _SVG ('tags') ?></span>
      </a>
    <?php } ?>
  </label>

</form>
