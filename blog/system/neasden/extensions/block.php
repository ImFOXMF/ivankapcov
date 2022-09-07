<?php

class NeasdenGroup_block implements NeasdenGroup {

  function __construct ($neasden) {
    $this->neasden = $neasden;
  
    $neasden->define_line_class (
      'block',
      '^\.([a-z-_]+) (.+)'
    );
    $neasden->define_group ('block', '(-block-)');
  
  }

  function render ($group, $myconf) {
  
    $p = false;

    $line = $group[0];

    $class = $line['class-data'][1];
    $content = $line['class-data'][2];

    $result = '<p class="'. $class .'">';
    $result .= $content;
    $result .= '</p>'."\n";
  
    return $result;
    
  }
  
}

?>