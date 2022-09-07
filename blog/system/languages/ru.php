<?php 

// display_name = Русский

function e2l_load_strings () {

  return array (

  // engine
  'e2--vname-aegea' => 'Эгея',
  'e2--release' => 'релиз',
  'e2--powered-by' => 'Движок —',
  'e2--default-blog-title' => 'Мой блог',
  'e2--default-blog-author' => 'Автор блога',
  'e2--website-host' => 'blogengine.ru',
  
  // installer
  'pt--install' => 'Установка Эгеи',
  'gs--user-fixes-needed' => 'Так, нужно кое-что поправить.',
  'gs--following-folders-missing' => 'Не найдены следующие папки из дистрибутива движка:',
  'gs--could-not-create-them-automatically' => 'Создать их автоматически не удалось из-за недостатка прав. Загрузите на сервер полный дистрибутив.',
  'gs--and-reload-installer' => 'И перезагрузите установщик',
  'fb--begin' => 'Начать блог',
  'fb--retry' => 'Попробовать ещё раз',
  'gs--db-parameters' => 'Параметры базы данных, которые предоставил хостер',
  'gs--ask-hoster-how-to-create-db' => 'Уточните у хостера, как создать базу, если её нет',
  'er--double-check-db-params' => 'Перепроверьте реквизиты базы',
  'gs--instantiated-version' => 'Инстанциирована версия',
  'gs--database' => 'База данных',
  'gs--password-for-blog' => 'Пароль, который хотите использовать для доступа к блогу',
  'gs--data-exists' => 'В этой базе уже есть блог. Установщик просто подключится к ней.',
  'er--db-data-incomplete' => 'Данные в этой базе — неполные.',
  'er--db-data-incomplete-install' => 'Данные в этой базе — неполные. Возможно, с ней использовалась другая версия Эгеи. Установите Эгею той версии, от которой данные в базе, а потом обновите, если нужно. Для чистой установки предоставьте чистую базу.',

  // diags
  'et--fix-permissions-on-server' => 'Настройте права на сервере',
  'gs--enable-write-permissions-for-the-following' => 'Пожалуйста, дайте права на запись здесь:',
  
  // sign in
  'pt--sign-in' => 'Вход',
  'er--cannot-write-auth-data' => 'Не удаётся записать данные аутентификации',

  // archive
  'pt--nth-year' => '$[year]-й год',
  'pt--nth-month-of-nth-year' => '$[month.monthname] $[year] года',
  'pt--nth-day-of-nth-month-of-nth-year' => '$[day] $[month.monthname.genitive] $[year]-го',
  'gs--nth-month-of-nth-year' => '$[month.monthname] $[year]',
  'gs--nth-day-of-nth-month-of-nth-year' => '$[day] $[month.monthname.genitive] $[year]',
  'gs--everything' => 'Всё',
  'gs--part-x-of-y' => 'часть $[part] из $[of]',
  
  // posts
  'ln--new-post' => 'Новая',
  'bt--close-comments-to-post' => 'Закрыть комментарии к заметке',
  'bt--open-comments-to-post' => 'Открыть комментарии к заметке',
  'pt--new-post' => 'Новая заметка',
  'pt--edit-post' => 'Правка заметки',
  'er--post-must-have-title-and-text' => 'У заметки должны быть название и текст',
  'er--error-updating-post' => 'Ошибка при изменении заметки',
  'er--error-deleting-post-tag-info' => 'Ошибка при удалении данных о тегах заметки',
  'er--wrong-datetime-format' => 'Неправильный формат даты-времени. Должен быть: «ДД.ММ.ГГГГ ЧЧ:ММ:СС»',  
  'er--cannot-create-thumbnail' => 'Не удалось создать уменьшенное изображение',
  'er--cannot-upload' => 'Не удалось загрузить файл',
  'ff--title' => 'Название',
  'ff--text' => 'Текст',
  'ff--saving' => 'Сохранение...',
  'ff--save' => 'Сохранить',
  'ff--summary' => 'Краткое описание',
  'ff--tags' => 'Теги',
  'ff--alias' => 'Ссылка',
  'ff--change-time' => 'Изменить время',
  'ff--delete' => 'Удалить',
  'ff--edit' => 'Редактировать',
  'fb--hide' => 'Скрыть',
  'fb--show' => 'Сделать видимой',
  'fb--withdraw' => 'Вернуть в черновики',
  'ff--will-be-published' => 'Опубликуется',
  'ff--is-published' => 'Опубликована',
  'ff--at-address' => 'по адресу',
  'gs--no-notes' => 'Заметок нет.',
  'gs--will-be-published' => 'Опубликуется',

  // see NiceError.php!
  'er--supported-only-png-jpg-gif' => 'Поддерживаются только изображения png, jpg и gif',
  'er--unsupported-file' => 'Поддерживаются только изображения png, jpg, gif и svg, видео mp4 и mov и аудиофайлы mp3',

  'ff--gmt-offset' => 'Разница с Гринвичем',
  'ff--with-dst' => '+1 летом',
  'ff--post-time' => 'Время публикации',
  
  'pt--post-deletion' => 'Удаление заметки',
  'gs--post-will-be-deleted' => 'Заметка «$[post]» будет удалена вместе со всеми комментариями.',

  'gs--post-will-be-hidden' => 'Заметка останется на месте, но будет видна только вам. Другие не увидят даже по прямой ссылке. Можно будет снова сделать видимой',
  'gs--post-will-be-withdrawn' => 'Комментарии удалятся, дата публикации забудется. Можно будет опубликовать ещё раз',

  // uploads
  'gs--kb' => 'КБ',
  'mi--upload-file' => 'Загрузить файл',
  'mi--delete' => 'Удалить',
  'mi--insert' => 'Вставить',

  // frontpage 
  'nm--posts' => 'Заметки',
  'gs--next-posts' => 'следующие',
  'gs--prev-posts' => 'предыдущие',
  'gs--unsaved-changes' => 'Не сохранены изменения:',
  
  // drafts
  'ln--drafts' => 'Черновики',
  'pt--drafts' => 'Черновики',
  'pt--draft-deletion' => 'Удаление черновика',
  'pt--edit-draft' => 'Правка черновика',
  'gs--no-drafts' => 'Черновиков нет.',
  'gs--not-published' => 'Не опубликовано',
  'gs--secret-link' => 'Секретная ссылка',
  'gs--draft-will-be-deleted' => 'Черновик «$[draft]» будет удалён.',
  
  // comments
  'pt--new-comment' => 'Новый комментарий',
  'pt--edit-comment' => 'Правка комментария',
  'pt--reply-to-comment' => 'Ответ на комментарий',
  'pt--edit-reply-to-comment' => 'Правка ответа на комментарий',
  'pt--unsubscription-done' => 'Получилось!',
  'pt--unsubscription-failed' => 'Не получилось',
  'gs--you-are-not-subscribed' => 'Кажется, вы и так не подписаны на комментарии к этой заметке',
  'gs--you-are-no-longer-subscribed' => 'Вы больше не подписаны на комментарии к заметке',
  'gs--unsubscription-didnt-work' => 'Почему-то отписка не сработала',          
  'gs--post-not-found' => 'Заметка не найдена',
  'gs--comment-too-long' => 'Слишком длинный комментарий',
  'gs--comment-too-long-description' => 'Вы отправили слишком длинный комментарий, поэтому он не был сохранён.',
  'gs--comment-double-post' => 'Повторный комментарий',
  'gs--comment-double-post-description' => 'Вы отправили комментарий дважды, сохранён был только один.',
  'gs--comment-spam-suspect' => 'Комментарий похож на спам',
  'gs--comment-spam-suspect-description' => 'Простите, но робот решил, что это спам, поэтому комментарий не был отправлен.',
  'gs--you-are-already-subscribed' => 'Вы подписаны на комментарии. Ссылка для отписки приходит в каждом письме с новым комментарием.',
  'er--post-not-commentable' => 'Эту заметку нельзя комментировать',
  'er--name-email-text-required' => 'И имя, и эл. адрес, и текст комментария обязательны',
  'ff--notify-subscribers' => 'Отправить по почте комментатору и другим подписчикам',
  'gs--your-comment' => 'Ваш комментарий',
  'gs--sign-in-via' => 'Войти через',
  'ff--full-name' => 'Имя и фамилия',
  'ff--email' => 'Эл. почта',
  'ff--subscribe-to-others-comments' => 'Получать комментарии других по почте',
  'ff--text-of-your-comment' => 'Текст вашего комментария',
  'gs--n-comments' => '$[number.cardinal]',
  'gs--no-comments' => 'Нет комментариев',
  'gs--comments-all-one-new' => 'новый',
  'gs--comments-all-new' => 'новые',
  'gs--comments-n-new' => '$[number.cardinal]',
  'mi--reply' => 'Ответить',
  'mi--edit' => 'Редактировать',
  'mi--highlight' => 'Выделить',
  'mi--remove' => 'Убрать',
  'gs--replace' => 'Вернуть',
  
  // tags
  'pt--tags' => 'Теги',
  'pt--tag' => 'Тег',
  'pt--posts-tagged' => 'Заметки с тегом',
  'tt--edit-tag' => 'Править параметры и описание тега',
  'gs--tagged' => 'с тегом',
  'pt--tag-edit' => 'Изменение тега',
  'pt--tag-delete' => 'Удаление тега',
  'pt--posts-without-tags' => 'Заметки без тегов',
  'gs--no-tags' => 'Тегов нет.',
  'gs--no-posts-without-tags' => 'Заметок без тегов нет.',
  'er--cannot-rename-tag' => 'Такое имя или вид в адресной строке уже используются другим тегом',
  'ff--tag-name' => 'Тег',
  'ff--tag-urlname' => 'В адресной строке',
  'ff--tag-page-title' => 'Название страницы',
  'ff--tag-introductory-text' => 'Вступительный текст',
  'gs--tag-will-be-deleted-notes-remain' => 'Тег «$[tag]» будет удалён из заметок, но сами заметки останутся.',
  'gs--see-also' => 'См. также',
  'gs--tags-important' => 'важные',
  'gs--tags-all' => 'все',
  'gs--tags' => 'Теги',
  
  // most commented and favourites
  'pt--most-commented' => 'Самые комментируемые$[period.periodname]',
  'pt--most-read' => 'Популярное$[period.periodname]',
  'nm--most-read' => 'Популярное',
  'pt--favourites' => 'Избранное',
  'nm--favourites' => 'Избранное',
  'gs--no-favourites' => 'Избранного нет.',
  'nm--read-next' => 'Дальше',
  
  // generic posts pages
  'nm--pages' => 'Страницы',
  'gs--page' => 'страница',
  'gs--next-page' => 'следующая',
  'gs--prev-page' => 'предыдущая',
  'gs--earlier' => 'Ранее',
  'gs--later' => 'Позднее',
  'pt--n-posts' => '$[number.cardinal]',
  'pt--no-posts' => 'Нет заметок',

  // search
  'pt--search' => 'Поиск',
  'pt--search-query-empty' => 'Текст для поиска пуст',
  'pt--search-query-too-short' => 'Слишком короткий текст',
  'gs--found-for-query' => 'по запросу',
  'gs--search-query-empty' => 'Текст для поиска пуст, напишите что-нибудь',
  'gs--search-query-too-short' => 'Слишком короткий текст, напишите хотя бы 4 буквы.',
  'gs--search-too-few-notes' => 'Поиск заработает, когда будет больше заметок.',
  'gs--nothing-found' => 'Ничего не найдено.',
  'gs--many-posts' => 'Много заметок',
  'pt--search-results' => 'Результаты поиска',
  
  // password, sessions, settings
  'pt--password' => 'Пароль',
  'pt--password-for-blog' => 'Пароль для доступа к блогу',
  'ff--old-password' => 'Старый пароль',
  'ff--new-password' => 'Новый пароль',
  'fb--change' => 'Поменять',
  'gs--password-changed' => 'Пароль изменён',
  'er--could-not-change-password' => 'Не получилось изменить пароль',
  'er--no-password-entered' => 'Вы не ввели пароль',
  'er--wrong-password' => 'Неправильный пароль',
  'ff--displayed-as-plain-text' => 'отображается при вводе',
  'er--settings-not-saved' => 'Настройка не сохранена',
  'pt--password-reset' => 'Сброс пароля',
  'gs--password-reset-link-sent-maybe' => 'Если вы указали правильный адрес, ссылка сброса пароля отправлена по почте',
  'gs--password-reset-link-saved' => 'Ссылка сброса пароля сохранена в файл /user/password-reset.psa в папке блога на сервере.',
  'er--cannot-reset-password' => 'Невозможно сбросить пароль: в Настройке не указана почта. Свяжитесь с администрацией.',
  'er--cannot-send-link-email-empty' => 'Невозможно отправить ссылку на сброс пароля: адрес не указан',
  'gs--i-forgot' => 'Я забыл',
  'em--password-reset-subject' => 'Сброс пароля в Эгее',
  'em--follow-this-link' => 'Перейдите по этой ссылке, чтобы сбросить пароль:',

  'pt--sessions' => 'Открытые сессии',
  'gs--sessions-description' => 'Когда вы заходите под своим паролем на нескольких устройствах или с помощью нескольких браузеров, здесь показывается список всех таких сессий. Если какая-то из них вызывает подозрения, завершите все сессии кроме текущей, а потом смените пароль от блога.',
  'gs--sessions-browser-or-device' => 'Браузер или устройство',
  'gs--sessions-when' => 'Когда',
  'gs--sessions-from-where' => 'Откуда',
  'gs--locally' => 'локально',
  'gs--unknown' => 'неизвестен',
  'fb--end-all-sessions-but-this' => 'Завершить все сессии кроме текущей',
  'gs--ua-iphone' => 'Айфон',
  'gs--ua-ipad' => 'Айпад',
  'gs--ua-opera' => 'Опера',
  'gs--ua-firefox' => 'Фаерфокс',
  'gs--ua-chrome' => 'Хром',
  'gs--ua-safari' => 'Сафари',
  'gs--ua-unknown' => 'Неизв.',
  'gs--ua-for-mac' => 'на Маке',

  'pt--settings' => 'Настройка',
  'ff--language' => 'Язык',
  'ff--theme' => 'Тема',
  'ff--theme-how-to' => 'Как создать свою тему?',
  'gs--theme-preview' => 'Предпросмотр',
  'ff--posts' => 'Заметки',
  'ff--respond-to-dark-mode' => 'Поддерживать Тёмный режим',
  'ff--items-per-page-after' => 'на странице',
  'ff--show-view-counts' => 'Показывать счётчики просмотров',
  'ff--show-sharing-buttons' => 'Показывать социокнопки',
  'ff--comments' => 'Комментарии',
  'ff--comments-enable-by-default' => 'Разрешать по умолчанию в новых заметках',
  'ff--comments-require-social-id' => 'Только при входе через соцсеть',
  'ff--only-for-recent-posts' => 'Только к свежим заметкам',
  'ff--send-by-email' => 'Присылать по почте',
  'ff--yandex-metrika' => 'Яндекс.​Метрика',
  'ff--google-analytics' => 'Гугль-Аналитика',
  'gs--password' => 'Пароль',
  'gs--db-connection' => 'Соединение с базой',
  'gs--get-backup' => 'Скачать последний бекап',
  'gs--not-paid' => 'Эгея не оплачена',
  'gs--paid-until' => 'Эгея оплачена до',
  'gs--paid-period-ended' => 'Оплаченный период закончился',
  'bt--learn-about-payment' => 'Узнать об оплате',
  'gs--used' => 'Занято $[used] из $[total] МБ ($[percent]%)',
  'gs--used-all' => 'Занято всё место: $[total] МБ',

  'ff--blog-title' => 'Название блога',
  'ff--subtitle' => 'Подзаголовок',
  'gs--remove-userpic' => 'Удалить фотографию',
  'ff--blog-description' => 'Описание блога',
  'gs--search-engines-social-networks-aggregators' => 'Для поисковых систем, соцсетей и агрегаторов',
  'ff--blog-author-picture-and-name' => 'Фото и имя автора',

  'pt--database' => 'База данных',
  'ff--db-host' => 'Сервер',
  'ff--db-username-and-password' => 'Имя пользователя и пароль',
  'ff--db-name' => 'Название базы',
  'fb--connect-to-this-db' => 'Подключиться с этими параметрами',
  'er--cannot-save-data' => 'Не получается сохранить данные',
  'gs--drag-userpic-here' => 'Перетащите сюда свою фотографию',
  
  // welcome
  'pt--welcome' => 'Готово!',
  'pt--welcome-text-pre' => 'Блог создан. ',
  'pt--welcome-text-href-write' => 'Напишите заметку',
  'pt--welcome-text-or' => ' или ',
  'pt--welcome-text-href-settings' => 'настройте что-нибудь',
  'pt--welcome-text-post' => '.',

  // need for password
  'gs--need-password' => 'Ваш пароль',
  'ff--public-computer' => 'Чужой компьютер',
  'gs--frontpage' => 'Главная страница',
  
  // form buttons
  'fb--submit' => 'Отправить',
  'fb--save-changes' => 'Сохранить изменения',
  'fb--save-and-preview' => 'Сохранить и посмотреть',
  'fb--publish' => 'Опубликовать',
  'fb--publish-note' => 'Опубликовать заметку',
  'fb--publish-note-at-this-time' => 'Опубликовать заметку в это время',
  'fb--select' => 'Выбрать',
  'fb--apply' => 'Применить',
  'fb--delete' => 'Удалить',
  'fb--sign-in' => 'Войти',
  'fb--sign-out' => 'Выйти',
  'fb--send-link-by-email' => 'Отправить ссылку по этому адресу',
  
  // time
  'pt--default-timezone' => 'Часовой пояс по умолчанию',
  'gs--e2-stores-each-posts-timezone' => 'Эгея хранит часовой пояс отдельно для каждой заметки.',
  'gs--e2-autodetects-timezone' => 'При публикации часовой пояс обычно определяется автоматически. А в случае неудачи используется выбранный здесь часовой пояс.',

  'tt--from-the-future' => 'Из будущего',
  'tt--now' => 'сейчас',
  'tt--just-now' => 'Только что',
  'tt--one-minute-ago' => 'Минуту назад',
  'tt--minutes-ago' => '$[minutes.cardinal] назад',
  'tt--one-hour-ago' => 'Час назад',
  'tt--hours-ago' => '$[hours.cardinal] назад',
  'tt--today' => 'Сегодня',
  'tt--today-at' => 'Сегодня в $[time]',
  
  'tt--seconds-short' => '$[value.cardinal]',
  'tt--minutes-short' => '$[value.cardinal]',
  'tt--hours-short' => '$[value.cardinal]',
  'tt--days-short' => '$[value.cardinal]',
  'tt--months-short' => '$[value.cardinal]',
  'tt--years-short' => '$[value.cardinal]',

  'tt--date' => '$[day] $[month.monthname.genitive]',
  'tt--date-and-time' => '$[day] $[month.monthname.genitive], $[time]',
  'tt--date-year-and-time' => '$[day] $[month.monthname.genitive] $[year], $[time]',

  'tt--zone-pt' => 'Тихоокеанское время',
  'tt--zone-mt' => 'Горное время',
  'tt--zone-ct' => 'Центральное время',
  'tt--zone-et' => 'Восточное время',
  'tt--zone-gmt' => 'Время по Гринвичу',
  'tt--zone-cet' => 'Центрально-европейское время',
  'tt--zone-eet' => 'Восточно-европейское время',
  'tt--zone-msk' => 'Московское время',
  'tt--zone-ekt' => 'Челябинское время',
  'gs--timezone-offset-hours' => 'ч',
  'gs--timezone-offset-minutes' => 'мин',
  
  // mail
  'em--comment-new-to-author-subject' => '$[commenter] комментирует $[note-title]',
  'em--comment-new-to-public-subject' => '$[commenter] комментирует $[note-title]',
  'em--comment-reply-to-public-subject' => '$[blog-author] отвечает на комментарий',
  'em--comment-reply' => '$[note-title] ($[blog-author] ответил)',
  'em--created-automatically' => 'Письмо создано автоматически.',
  'em--unsubscribe' => 'Отписаться от этого обсуждения',
  'em--reply' => 'Ответить',
  'em--comment-replied-at' => 'Комментарий, на который ответил автор',
  
  // rss
  'gs--posts-tagged' => 'заметки с тегом',

  'gs--subscribe-to-blog' => 'Подписаться на блог',

  // social networks
  'sn--twitter-verb' => 'Твитнуть',
  'sn--facebook-verb' => 'Поделиться',
  'sn--linkedin-verb' => 'Поделиться',
  'sn--vkontakte-verb' => 'Поделиться',
  'sn--telegram-verb' => 'Отправить',
  'sn--whatsapp-verb' => 'Отправить',
  'sn--pinterest-verb' => 'Запинить',

  // umacros
  'um--month' => '$[month.monthname]',
  'um--month-short' => '$[month.monthname.short]',
  'um--month-g' => '$[month.monthname.genitive]',
  
  // more strings
  'gs--subscribe' => 'Подписка на блог',
  
  'gs--no-such-notes' => 'Заметок нет.',
  'pt--page-not-found' => 'Страница не найдена',
  'gs--page-not-found' => 'Страница не найдена.',
  
  'er--cannot-find-db' => 'Не могу найти базу данных',
  'er--cannot-connect-to-db' => 'Не могу соединиться с базой данных',
  'er--mysql-version-too-old' => 'Версия базы данных слишком старая ($[v1], нужна $[v2]+)',
  'er--error-occurred' => 'Произошла ошибка',
  'er--too-many-errors' => 'Слишком много ошибок',
  'gs--rss' => 'РСС',
  
  'gs--pgt' => 'Время генерации',
  'gs--seconds-contraction' => 'с',
  'gs--updated-successfully' => 'Выполнено обновление с версии $[from] до версии $[to]',
  'gs--good-blogs' => 'Хорошие блоги и сайты',

  'gs--range-separator' => '<span style="margin-left: .07em; letter-spacing: .07em">...</span>',
  
  'ab--menu-actions' => 'Действия',

  '--secondary-language' => 'en',
  
  );
  
}



function e2lstr_monthname ($number, $modifier) {
  if ($modifier == 'genitive') {
    $tmp = array (
      'декабря', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
      'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря', 'января'
    );
  } elseif ($modifier == 'short') {
    $tmp = array (
      'дек', 'янв', 'фев', 'март', 'апр', 'май', 'июнь',
      'июль', 'авг', 'сен', 'окт', 'ноя', 'дек', 'янв'
    );
  } else {
    $tmp = array (
      'Декабрь', 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
      'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь', 'Январь'
    );
  }
  return $tmp[(int) $number];
}


function e2lstr_periodname ($period) {
  /**/if ('year' == $period) return ' за год';
  elseif ('month' == $period) return ' за месяц';
  elseif ('week' == $period) return ' за неделю';
  elseif ('day' == $period) return ' за день';
  else return '';
}


function e2lstr_cardinal ($number, $modifier, $string_id) {

  $what = $number;
  if ($string_id == 'pt--n-posts') $what = $number .' замет(ка,ки,ок)';
  if ($string_id == 'tt--minutes-ago') $what = $number .' минут(у,ы,)';
  if ($string_id == 'tt--hours-ago') $what = $number .' час(а,ов)';
  if ($string_id == 'gs--n-comments') $what = $number .' комментари(й,я,ев)';
  if ($string_id == 'gs--comments-n-new') $what = $number .' новы(й,х,х)';

  if ($string_id == 'tt--seconds-short') $what = $number .' с';
  if ($string_id == 'tt--minutes-short') $what = $number .' мин';
  if ($string_id == 'tt--hours-short') $what = $number .' ч';
  if ($string_id == 'tt--days-short') $what = $number .' (д,дн,дн)';
  if ($string_id == 'tt--months-short') $what = $number .' мес';
  if ($string_id == 'tt--years-short') $what = $number .' (год,года,лет)';

  return e2_decline_for_number ($what);

}



?>