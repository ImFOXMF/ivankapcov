<?php

class NeasdenGroup_picture implements NeasdenGroup {

  private $neasden = null;
  
  function __construct ($neasden) {
    $this->neasden = $neasden;

    $neasden->define_line_class ('picture', '.*\.(jpe?g|gif|png|svg)(?: +(.+))?');
    $neasden->define_group ('picture', '(-picture-)(-p-)*');
  }
    
  function detect_line ($line, $myconf) {
    list ($filebasename, ) = explode (' ', $line, 2);  
    return is_file ($myconf['folder'] . $filebasename);
  }  
  
  function render ($group, $myconf) {
    $p = false;

    $result = '<div class="'. $myconf['css-class'] .'">'."\n";
    foreach ($group as $line) {
      @list ($filebasename, $alt) = explode (' ', $line['content'], 2);
      
      // check if alt start with an url
      @list ($link, $newalt) = explode (' ', $alt, 2);
      if (preg_match ('/[a-z]+\:.+/i', $link)) { // usafe
        $alt = $newalt;
      } else {
        $link = '';
      }
      
      if ($line['class'] == 'picture') {
  
        $this->neasden->resource_detected ($filebasename);
        
        $filename = $myconf['folder'] . $filebasename;
        $pathinfo = pathinfo ($filename);
        
        $width = $height = $ratio = 0;

        if ($pathinfo['extension'] == 'svg') {
          // echo $filename;
          $xmlget = simplexml_load_string (file_get_contents ($filename));
          if ($xmlget) {
            $xmlattributes = $xmlget->attributes ();
            list ($width, $height) = array ((string) $xmlattributes -> width, (string) $xmlattributes -> height);
            if (!$width) $width = $myconf['max-width'];
            if (!$height) $height = $myconf['max-width'];
          }
        } elseif ($size = @getimagesize ($filename)) {
          // $size = false;
          // sometimes it comes as false and breaks everything :-()
          list ($width, $height) = $size;
        }

        if (substr ($filebasename, strrpos ($filebasename, '.') - 3, 3) == '@2x') {
          $width /= 2;
          $height /= 2;
        }
  
        // image too wide
        if ($width > $myconf['max-width']) {
          $height = $height * ($myconf['max-width'] / $width);
          $width = $myconf['max-width'];  
        }

        if ($width) $ratio = $height / $width;
        
        $image_html = (
          '<img src="'. $myconf['src-prefix'] . $filebasename .'" '.
          'width="'. $width .'" height="'. $height.'" '.
          'alt="'. htmlspecialchars ($alt) .'" />'. "\n"
        );
  
        if (! $this->neasden->config['html.basic']) {
          // wrap into upyachka fix
          $image_html = (
            '<div style="width: '. $width .'px; max-width: 100%">'.
            '<div class="e2-text-proportional-wrapper" style="'.
            'padding-bottom: '. @round ($ratio * 100, 2).'%'.
            '">'.
            $image_html.
            '</div>'.
            '</div>'
          );
        }

        // wrap into a link to URL if needed
        $cssc_link = $myconf['css-class'] .'-link';
        if ($link) {
          $image_html = (
            '<a href="'. $link .'" class="'. $cssc_link .'">' ."\n".
            $image_html .
            '</a>'
          );
        }

        $result .= $image_html;
        
      } else {
        if (!$p) {
          $p = true;
          $result .= '<div class="e2-text-caption">' . $line['content'];
        } else {
          $result .= '<br />' . "\n" . $line['content'];
        }
      }
    }
  
    if ($p) $result .= '</div>'."\n";
  
    $result .= '</div>'."\n";
    
    return $result;
    
  }
  
}

?>