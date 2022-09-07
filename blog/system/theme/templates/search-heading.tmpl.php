<span class="e2-search">

<form
  id="e2-search"
  class="e2-enterable"
  action="<?= @$content['form-search']['form-action'] ?>"
  method="post"
  accept-charset="utf-8"
>
  <label class="e2-search-input">
    <input class="e2-search-input-input text" type="text" name="query" id="query"
      value="<?= @$content['form-search']['query'] ?>" />

      <div class="e2-search-icon"><?= _SVG ('loupe') ?></div>
      <div class="e2-search-icon-placeholder"></div>

  </label>
</form>

</span>

<?php
$tags = [];
if (array_key_exists ('search-related-tags', $content)) {
  foreach ($content['search-related-tags'] as $tag) {
    $classname = 'e2-tag'. ($tag['visible?']? '' : ' e2-tag-hidden');
    if ($tag['current?']) {
      $tags[] = '<mark class="'. $classname .'">'. $tag['name'] .'</mark>';
    } else {
      $tags[] = '<a href="'. $tag['href'] .'" class="'. $classname .'">'. $tag['name'] .'</a>';
    }
  }
}
$tags = implode (' &nbsp; ', $tags);
if ((string) $tags !== '') {
  $tags = _S ('gs--see-also') .':  '. $tags;
}
?>

<?php if ((string) $tags !== '') { ?> 
<div class="e2-heading-meta"><?= $tags ?></div>
<?php } ?>