<?php

  $settings_href = '../settings';
  $self_href = 'javascript:;';
  // $self_href = $_current_url;
  
  $return['class'] = 'themepreview';
  $return['title'] = 'Предпросмотр темы';
  $return['heading'] = 'Предпросмотр темы';

  // $return['theme-preview']['no-themes'] = '
  // <p>Чтобы сделать свою тему:</p>
  // <ol>
  //   <li>Сделайте копию понравившейся вам темы в папке <tt>themes</tt>.</li>
  //   <li>Отредактируйте <tt>theme-info.php</tt>.</li>
  //   <li>Переключитесь на свою новую тему <a href="'. $settings_href .'">в настройке</a>.</li>
  // </ol>
  // ';

  $return['theme-preview']['no-themes'] = '
  <p>На этой странице смотрите и настраивайте вашу тему оформления.</p>
  ';

  // $return['theme-preview']['themes-before'] = '
  // <p>Выберите оформление:</p>
  // ';

  // $return['theme-preview']['themes-after'] = '
  // <p>Выберите тему из списка, чтобы переключиться в неё.</p>
  // <p>На этой странице смотрите и настраивайте вашу тему. Она состоит из элементов блога, начиная с заметок. Не забудьте проверить на мобильном телефоне.</p>
  // ';
  
  $return['notes'] = array (
    array (
      'id' => 1,
      'title' => 'Заметка-образец',
      'text' => '
      <p>Так выглядит заметка. Это заметка со звездой. Во встроенной теме у неё крупный заголовок, но вы можете выделить его иначе.</p>
      <p>В этом абзаце — рыбный текст. Теория вчувствования свободна. Ритм изящно имеет фактографический хтонический миф. Художественное опосредование представляет собой катарсис. Литургическая драма имеет психологический параллелизм.</p>
      <h2>Подзаголовки, форматирование текста и картинки</h2>
      <p>В заметке могут быть подзаголовки, как здесь, <a href="'. $self_href .'">ссылки</a> и разные виды форматирования текста — <i>курсив</i>, <b>жирный</b>, <tt>моноширинный</tt>.</p>
      <p>Картинка с подписью:</p>
      <div class="e2-text-picture">
      <div style="width: 800px; max-width: 100%"><div class="e2-text-proportional-wrapper" style="padding-bottom: 44.375%"><img src="system/theme/images/sample-image.jpg" width="800" height="355" alt="">
      </div></div>
      <div class="e2-text-caption">Сотворение Адама. Микеланджело, ок. 1511 г.</div>
      </div>
      <p>За этим абзацем следует таблица. В этом абзаце — рыбный текст. Теория вчувствования свободна. Ритм изящно имеет фактографический хтонический миф. Художественное опосредование представляет собой катарсис. Литургическая драма имеет психологический параллелизм.</p>
      <div class="e2-text-table">
        <table cellpadding="0" cellspacing="0" border="0">
        <tr><th>Город</th><th>Часовой пояс</th><th>Код</th><th>К Гринвичу</th></tr>
        <tr><td>Челябинск</td><td>Екатеринбургское время</td><td><nobr>YEKT</nobr></td><td>+5 ч.</td></tr>
        <tr><td>Москва</td><td>Московское время</td><td><nobr>MSK</nobr></td><td>+3 ч.</td></tr>
        <tr><td>Лондон</td><td>Средне время по Гринвичу</td><td><nobr>GMT</nobr></td><td></td></tr>
        <tr><td><nobr>Нью-Йорк</nobr></td><td>Североамериканское восточное время</td><td><nobr>ET</nobr></td><td>−5 ч.</td></tr>
        <tr><td><nobr>Сан-Франциско</nobr></td><td>Тихоокеанское время</td><td><nobr>PT</nobr></td><td>−8 ч.</td></tr>
        </table>
      </div>
      <p>Часть текста может быть отделена горизонтальной линейкой:</p>
      <hr />
      <p>Упорядоченный список:</p>
      <ol>
        <li>Это длинный элемент списка, чтобы посмотреть, как выглядит перенос на несколько строк — убедитесь что отступы между элементами списка больше, чем между строками одного элемента.</li>
        <li>А это — короткий элемент.</li>
      </ol>
      <p>Неупорядоченный список:</p>
      <ul>
        <li>это длинный элемент списка, чтобы посмотреть, как выглядит перенос на несколько строк — убедитесь что отступы между элементами списка больше, чем между строками одного элемента;</li>
        <li>а это — короткий элемент.</li>
      </ul>
      ',
      // 'summary' => '',
      // 'format-info' => array 2
      // 'time' => e2 time 8 May 2017, 20:46, GMT+05:00
      // 'last-modified' => e2 time 14 May 2017, 19:51, GMT+05:00
      // 'last-ip' => NULL,
      'draft?' => false,
      'scheduled?' => false,
      'public?' => true,
      'hidden?' => false,
      'commentable?' => true,
      'favourite?' => true,
      'tags' => array (
         array (
           'name' => 'тег',
           'href' => '',
           'current?' => false,
         ),
         array (
           'name' => 'другой тег',
           'href' => '',
           'current?' => false,
         ),
      ),
      'read-count' => 42,
      'comments-count' => 5,
      'comments-count-text' => '5 комментариев',
      'href' => $self_href,
      'href-comments' => $self_href,
      // 'href-original' => 'http://e2/all/muzlo/',
      'comments-link?' => true,
      'new-comments-count' => 0,
      'new-comments-count-text' => '0 new',
      // 'favourite-toggle-href' => 'http://e2/all/muzlo/favourite/',
      // 'edit-href' => 'http://e2/all/muzlo/edit/',
      // 'og-images' => array (),
    ),
    array (
      'id' => 2,
      'title' => 'Другая заметка-образец',
      'text' => '
      <p>Это ещё один пример, чтобы вы настроили расстояние между заметками в ленте. Ещё это заметка без звезды, в отличие от предыдущей. Заголовок этой заметки не является ссылкой — как будто мы уже на её странице. Ещё один из тегов снизу подсвечен — как будто мы на его странице.</p>
      ',
      // 'summary' => '',
      // 'format-info' => array 2
      // 'time' => e2 time 8 May 2017, 20:46, GMT+05:00
      // 'last-modified' => e2 time 14 May 2017, 19:51, GMT+05:00
      // 'last-ip' => NULL,
      'draft?' => false,
      'scheduled?' => false,
      'public?' => true,
      'hidden?' => false,
      'commentable?' => false,
      'favourite?' => false,
      'tags' => array (
         array (
           'name' => 'первый тег',
           'href' => $self_href,
           'current?' => false,
         ),
         array (
           'name' => 'текущий тег',
           'href' => $self_href,
           'current?' => true,
         ),
         array (
           'name' => 'и ещё один',
           'href' => $self_href,
           'current?' => false,
         ),
      ),
      'read-count' => 147,
      // 'comments-count' => 0,
      // 'comments-count-text' => '5 комментариев',
      // 'href' => $self_href,
      // 'href-original' => 'http://e2/all/muzlo/',
      // 'comments-link?' => true,
      // 'new-comments-count' => 2,
      // 'new-comments-count-text' => '2 new',
      // 'favourite-toggle-href' => 'http://e2/all/muzlo/favourite/',
      // 'edit-href' => 'http://e2/all/muzlo/edit/',
      // 'og-images' => array (),
    ),
    array (
      'id' => 3,
      'title' => 'Пример заметки в результатах <mark>поиска</mark>',
      'text' => '',
      'snippet-text' => '
      <p>Так выглядит заметка в результатах <mark>поиска</mark>. Текст запроса <mark>подсвечивается</mark>, а все картинки из заметки показываются ниже. Некоторые из них тоже могут быть <mark>подсвечены</mark>. Тег <tt>mark</tt> используется для всей <mark>подсветки</mark>, включая тег в предыдущей заметке.</p>
      ',
      // 'summary' => '',
      // 'format-info' => array 2
      // 'time' => e2 time 8 May 2017, 20:46, GMT+05:00
      // 'last-modified' => e2 time 14 May 2017, 19:51, GMT+05:00
      // 'last-ip' => NULL,
      'draft?' => false,
      'scheduled?' => false,
      'public?' => true,
      'hidden?' => false,
      'commentable?' => false,
      'favourite?' => false,
      'read-count' => 31,
      'thumbs' => [
        [
          'is-available?' => true,
          'src' => 'system/theme/images/sample-thumb-1@2x.jpg',
          'width' => 100,
          'height' => 79,
          'highlighted?' => false,
        ],
        [
          'is-available?' => true,
          'src' => 'system/theme/images/sample-thumb-2@2x.jpg',
          'width' => 100,
          'height' => 67,
          'highlighted?' => false,
        ],
        [
          'is-available?' => true,
          'src' => 'system/theme/images/sample-thumb-3@2x.jpg',
          'width' => 100,
          'height' => 44,
          'highlighted?' => true,
        ],
      ],
      // 'comments-count' => 5,
      // 'comments-count-text' => '5 comments',
      'href' => $self_href,
      'href-comments' => $self_href,
      // 'href-original' => 'http://e2/all/muzlo/',
      // 'comments-link?' => true,
      // 'new-comments-count' => 2,
      // 'new-comments-count-text' => '2 new',
      // 'favourite-toggle-href' => 'http://e2/all/muzlo/favourite/',
      // 'edit-href' => 'http://e2/all/muzlo/edit/',
      // 'og-images' => array (),
    ),
  );

  $return['pages'] = array (
    'timeline?' => true,
    'count' => 2,
    'this' => 1,
    'earlier-href' => $self_href,
    'earlier-title' => 'Ранее',
    // 'later-href' => $self_href,
    // 'later-title' => 'Later',
    // 'prev-href' => 'http://e2/all/nastraivaem-https-na-hostinge-timeweb-dlya-egei/',
    // 'prev-title' => 'Настраиваем HTTPS на хостинге TimeWeb для Эгеи',
    // 'title' => 'Posts',
    // 'this-title' => 'Музло',
  );

  $return['comments'] = array (
    'each' => array (
      array (
        'gip-used?' => true,
        'gip' => 'twitter',
        'userpic-set?' => true,
        'userpic-href' => 'system/theme/images/sample-face-1.jpg',
        'important?' => false,
        'name' => 'Иван Петров',
        'text' => '<p>Это комментарий для примера. Далее идёт бессмысленный текст. Этот текст нужен только чтобы вы могли увидеть, как выглядит многострочный комментарий.</p><p>И ещё один абзац на всякий случай.</p>',
        'time' => array (
          0 => strtotime ('21 May 2019, 11:21 +0300'),
          1 => array (
            'offset' => 10800,
            'is_dst' => false,
          ),
        ),
        'replied?' => true,
        'reply-visible?' => true,
        'reply-important?' => true,
        'author-name' => 'Александр Пушкин',
        'reply' => '<p>Ёмкий ответ автора.</p>',
        'reply-time' => array (
          0 => strtotime ('15 Jun 2019, 22:13 +0300'),
          1 => array (
            'offset' => 10800,
            'is_dst' => false,
          ),
        ),
      ),
      array (
        'gip-used?' => true,
        'gip' => 'facebook',
        'userpic-set?' => true,
        'userpic-href' => 'system/theme/images/sample-face-2.jpg',
        'important?' => false,
        'name' => 'Констанция Константиновна Константинопольская',
        'text' => '<p>Короткий комментарий.</p>',
        'time' => array (
          0 => strtotime ('29 May 2019, 11:21 +0300'),
          1 => array (
            'offset' => 10800,
            'is_dst' => false,
          ),
        ),
      ),
    ),
    // 'rss-href' => 'http://e2/all/muzlo/comments-rss/',
    // 'toggle' => array 2
    'count' => 2,
    'count-text' => '2 comments',
    // 'new-count' => 0,
    // 'new-count-text' => '0 new',
    'display-form?' => true,
  );

  $return['form-comment'] = array (
    // '.note-id' => '4114',
    // '.comment-id' => 'new',
    // '.already-subscribed?' => false,
    'create:edit?' => true,
    'logged-in?' => true,
    'logged-in-gip' => 'facebook',
    'logout-url' => $self_href,
    // 'form-action' = 'http://e2/@actions/comment-process/',
    'submit-text' => 'Отправить',
    'show-subscribe?' => true,
    'subscribe?' => false,
    'subscription-status' => '',
    'email-field-name' => 'elton-john',
    'name' => 'Иван Петров',
    'email' => '',
    'text' => 'Это пример формы комментариев',
  );

  $return['tags'] = array (
    'menu-each' => array (
      array (
        'tag' => 'this is a list of',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'tags',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'that',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'you have chosen',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'to be shown',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'in the bottom',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'of the frontpage',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'it may',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'span',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'several',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'lines',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'depending on the number',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'of tags',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'and',
        'href' => $self_href,
        'current?' => false,
      ),
      array (
        'tag' => 'screen size',
        'href' => $self_href,
        'current?' => false,
      ),
    ),
  );

  // $return['popular'] = array (
  //   'title' => 'Popular',
  //   'each' => array (
  //     array (
  //       'href' => $self_href,
  //       // 'time' = array 2,
  //       'title' => 'These links appear under posts on their pages',
  //       'current?' => false,
  //     ),
  //     array (
  //       'href' => $self_href,
  //       // 'time' = array 2,
  //       'title' => 'A popular post',
  //       'current?' => false,
  //     ),
  //     array (
  //       'href' => $self_href,
  //       // 'time' = array 2,
  //       'title' => 'Another post that everyone talks about',
  //       'current?' => false,
  //     ),
  //     array (
  //       'href' => $self_href,
  //       // 'time' = array 2,
  //       'title' => 'Lorem ipsum dolor',
  //       'current?' => false,
  //     ),
  //     array (
  //       'href' => $self_href,
  //       // 'time' = array 2,
  //       'title' => 'Short',
  //       'current?' => false,
  //     ),
  //     array (
  //       'href' => $self_href,
  //       // 'time' = array 2,
  //       'title' => 'These links appear under posts on their pages',
  //       'current?' => false,
  //     ),
  //     array (
  //       'href' => $self_href,
  //       // 'time' = array 2,
  //       'title' => 'A popular post',
  //       'current?' => false,
  //     ),
  //     array (
  //       'href' => $self_href,
  //       // 'time' = array 2,
  //       'title' => 'Another post that everyone talks about',
  //       'current?' => false,
  //     ),
  //     array (
  //       'href' => $self_href,
  //       // 'time' = array 2,
  //       'title' => 'Lorem ipsum dolor',
  //       'current?' => false,
  //     ),
  //     array (
  //       'href' => $self_href,
  //       // 'time' = array 2,
  //       'title' => 'Short',
  //       'current?' => false,
  //     ),
  //   ),
  // );
  
  return $return;

  // $return['message']['each'] = array (
  //   array (
  //     'title' => 'No error, actually',
  //     'description' => 'Error message with a title',
  //   ),
  //   array (
  //     'description' => 'Error message without a title',
  //   ),
  //   array (
  //     'class' => 'serious',
  //     'description' => 'Serious error',
  //   ),
  //   array (
  //     'class' => 'info',
  //     'description' => 'Generic message',
  //   ),
  // );

  // <div class="e2-text-picture">
  //   <div style="width: 80%; height: 200px; background: #eee"></div>
  //   <div class="e2-text-caption">An image or video may have a caption</div>
  // </div>

?>