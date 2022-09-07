<?php

global $settings, $full_blog_url, $_lang, $_template;

return array (

  '__overload' => 'user/neasden/',
  
  '__profiles' => array (
    'full-rss' => array (
      'html.on' => true,
      'html.basic' => true,
      'groups.on' => true,
      'typography.markup' => true,
      'typography.autohref' => true,
      'banned-groups' => array (),
    ),
    'full' => array (
      'html.on' => true,
      'groups.on' => true,
      'typography.markup' => true,
      'typography.autohref' => true,
      'banned-groups' => array (),
    ),
    'simple-rss' => array (
      'html.on' => false,
      'html.basic' => true,
      'groups.on' => true,
      'typography.markup' => true,
      'typography.autohref' => true,
      'banned-groups' => array (
        'picture', 'video', 'fotorama', 'audio', 'youtube', 'vimeo'
      ),
    ),
    'simple' => array (
      'html.on' => false,
      'groups.on' => true,
      'typography.markup' => true,
      'typography.autohref' => true,
      'banned-groups' => array (
        'picture', 'video', 'fotorama', 'audio', 'youtube', 'vimeo'
      ),
    ),
    'kavychki' => array (
      'html.on' => true,
      'html.code.on' => false,
      'groups.on' => false,
      'typography.markup' => false,
      'typography.autohref' => false,
    ),
 ),
    
  'library' => SYSTEM_LIBRARY_FOLDER,
  
  'language' => $_lang,
  
  'html.on' => true,
  'html.elements.opaque' => 'p ul ol li pre',
  'html.elements.ignore' => 'div blockquote table tr td th thead tbody tfoot caption colgroup col',
  'html.elements.sacred' => 'object embed iframe head link script style code textarea',
  'html.basic' => false,

  'html.code.on' => true,
  'html.code.wrap' => array ('<pre class="e2-text-code"><code class="%s">', '</code></pre>'),  
  'html.code.highlightjs' => true,

  'html.img.prefix' => $full_blog_url .'/'. PICTURES_FOLDER,
  'html.img.detect' => true,

  'groups.on' => true,
  'groups.headings.char'  => '#',
  'groups.headings.plus'  => 1,
  'groups.quotes.char' => '>',
  'groups.lists.chars' => array ('-', '*'),
  'groups.generic-css-class' => 'e2-text-generic-object',
  'groups.classes' => array (
    'picture' => array (
      'src-prefix' => $full_blog_url .'/'. PICTURES_FOLDER,
      'folder' => MEDIA_ROOT_FOLDER . PICTURES_FOLDER,
      'css-class' => 'e2-text-picture', 
      'max-width' => $_template['max_image_width'],
    ),
    'video' => array (
      'src-prefix' => $full_blog_url .'/'. VIDEO_FOLDER,
      'folder' => MEDIA_ROOT_FOLDER . VIDEO_FOLDER,
      'css-class' => 'e2-text-video', 
      'max-width' => $_template['max_image_width'],
    ),
    'fotorama' => array (
      'src-prefix' => $full_blog_url .'/'. PICTURES_FOLDER,
      'folder' => MEDIA_ROOT_FOLDER . PICTURES_FOLDER,
      'css-class' => 'e2-text-picture',
      'max-width' => $_template['max_image_width'],
    ),
    'table' => array (
      'css-class' => 'e2-text-table',
    ),
    'onlinevideo' => array (
      'css-class' => 'e2-text-video',
      'max-width' => $_template['max_image_width'],
      'ratio' => 16/9,
    ),
    'audio' => array (
      'css-class' => 'e2-text-audio',
      'src-prefix' => $full_blog_url .'/'. AUDIO_FOLDER,
      'folder' => MEDIA_ROOT_FOLDER . AUDIO_FOLDER,
    ),
    'tweet' => array (
      'css-class' => 'e2-text-generic-object',
    ),
  ),
  
  'typography.on' => true,
  'typography.quotes' => true,
  'typography.markup' => true,
  'typography.autohref' => true,
  'typography.cleanup' => array (
    '&nbsp;' => ' ',
    '&laquo;' => '«',
    '&raquo;' => '»',
    '&bdquo;' => '„',
    '&ldquo;' => '“',
    '&rdquo;' => '”',
  ),

); ?>