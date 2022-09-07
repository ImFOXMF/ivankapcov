<?php

// display_name = Беларуская

function e2l_load_strings () {

  return array (

  // engine
  'e2--vname-aegea' => 'Эгея',
  'e2--release' => 'рэліз',
  'e2--powered-by' => 'Двіжок —',
  'e2--default-blog-title' => 'Мой блог',
  'e2--default-blog-author' => 'Аўтар блогу',
  'e2--website-host' => 'blogengine.ru',

  // installer
  'pt--install' => 'Усталяванне Эгеі',
  'gs--user-fixes-needed' => 'Трэба сёе-тое падправіць.',
  'gs--following-folders-missing' => 'Не знойдзены наступныя папкі з дыстрыбутыва двіжка:',
  'gs--could-not-create-them-automatically' => 'Стварыць іх аўтаматычна не атрымалася з-за недастатковасці правоў. Запампуйце на сервер поўны дыстрыбутыў.',
  'gs--and-reload-installer' => 'І перазаладкуйце ўсталёўнік',
  'fb--begin' => 'Пачаць блог',
  'fb--retry' => 'Паспрабаваць яшчэ раз',
  'gs--db-parameters' => 'Параметры базы звестак, якія выдаў хостэр',
  'gs--ask-hoster-how-to-create-db' => 'Удакладніце ў хостэра, як стварыць базу, калі яе няма',
  'er--double-check-db-params' => 'Пераправерце рэквізіты базы',
  'gs--instantiated-version' => 'Інстанцыявана версія',
  'gs--database' => 'База звестак',
  'gs--password-for-blog' => 'Пароль, які хочаце выкарыстоўваць для доступу да блогу',
  'gs--data-exists' => 'У гэтай базе ўжо ёсць блог. Усталёўнік проста падключыцца да яе.',
  'er--db-data-incomplete' => 'Звесткі ў гэтай базе — няпоўныя.',
  'er--db-data-incomplete-install' => 'Звесткі ў гэтай базе — няпоўныя. Магчыма, з ёй выкарыстоўвалася іншая версія Эгеі. Усталюйце Эгею той версіі, ад якой звесткі ў базе, а потым абнавіце, калі патрэбна. Для чыстага ўсталявання дайце чыстую базу.',

  // diags
  'et--fix-permissions-on-server' => 'Наладуйце правы на серверы',
  'gs--enable-write-permissions-for-the-following' => 'Калі ласка, дайце правы на запіс тут:',

  // sign in
  'pt--sign-in' => 'Уваход',
  'er--cannot-write-auth-data' => 'Не атрымоўваецца запісаць дадзеныя аўтэнтыфікацыі',

  // archive
  'pt--nth-year' => '$[year]-ы год',
  'pt--nth-month-of-nth-year' => '$[month.monthname] $[year] года',
  'pt--nth-day-of-nth-month-of-nth-year' => '$[day] $[month.monthname.genitive] $[year]-га',
  'gs--nth-month-of-nth-year' => '$[month.monthname] $[year]',
  'gs--nth-day-of-nth-month-of-nth-year' => '$[day] $[month.monthname.genitive] $[year]',
  'gs--everything' => 'Ўсё',
  'gs--part-x-of-y' => 'частка $[part] з $[of]',

  // posts
  'ln--new-post' => 'Новая',
  'bt--close-comments-to-post' => 'Закрыць каментары да нататкі',
  'bt--open-comments-to-post' => 'Адкрыць каментары да нататкі',
  'pt--new-post' => 'Новая нататка',
  'pt--edit-post' => 'Рэдагаванне нататкі',
  'er--post-must-have-title-and-text' => 'У нататкі павінны быць назва і тэкст',
  'er--error-updating-post' => 'Памылка пры змяненні нататкі',
  'er--error-deleting-post-tag-info' => 'Памылка пры выдаленні дадзеных аб тэгах нататкі',
  'er--wrong-datetime-format' => 'Няправільны фармат даты-часу. Павінен быць: «ДД.ММ.ГГГГ ЧЧ:ММ:СС»',
  'er--cannot-create-thumbnail' => 'Не атрымалася стварыць паменшаную выяву',
  'er--cannot-upload' => 'Не атрымалася запампаваць файл',
  'ff--title' => 'Назва',
  'ff--text' => 'Тэкст',
  'ff--saving' => 'Захаванне...',
  'ff--save' => 'Захаваць',
  'ff--summary' => 'Кароткае апісанне',
  'ff--tags' => 'Тэгі',
  'ff--alias' => 'Спасылка',
  'ff--change-time' => 'Змяніць час',
  'ff--delete' => 'Выдаліць',
  'ff--edit' => 'Рэдагаваць',
  'fb--hide' => 'Схаваць',
  'fb--show' => 'Зрабіць бачнай',
  'fb--withdraw' => 'Вярнуць у чарнавікі',
  'ff--will-be-published' => 'Апублікуецца',
  'ff--is-published' => 'Апублікавана',
  'ff--at-address' => 'па адрасу',
  'gs--no-notes' => 'Нататак няма.',
  'gs--will-be-published' => 'Апублікуецца',

  // see NiceError.php!
  'er--supported-only-png-jpg-gif' => 'Падтрымлiваюцца толькi выявы png, jpg i gif',
  'er--unsupported-file' => 'Падтрымлiваюцца толькi выявы png, jpg, gif i svg, відэа mp4 і mov i аудыёфайлы mp3',

  'ff--gmt-offset' => 'Розніца з Грынвічам',
  'ff--with-dst' => '+1 летам',
  'ff--post-time' => 'Чвс публікацыі',

  'pt--post-deletion' => 'Выдаленне нататкі',
  'gs--post-will-be-deleted' => 'Нататка «$[post]» будзе выдалена разам з усімі каментарамі.',

  'gs--post-will-be-hidden' => 'Нататка застанецца на месцы, але будзе бачная толькі вам. Іншыя не ўбачаць нават па прамой спасылцы. Можна будзе зноў зрабіць бачнай',
  'gs--post-will-be-withdrawn' => 'Каментары адыдуць, дата публікацыі забудзецца. Можна будзе апублікаваць яшчэ раз',

  // uploads
  'gs--kb' => 'КБ',
  'mi--upload-file' => 'Загрузіць файл',
  'mi--delete' => 'Выдаліць',
  'mi--insert' => 'Уставіць',

  // frontpage
  'nm--posts' => 'Нататкі',
  'gs--next-posts' => 'наступныя',
  'gs--prev-posts' => 'папярэднія',
  'gs--unsaved-changes' => 'Змены не захаваны:',

  // drafts
  'ln--drafts' => 'Чарнавікі',
  'pt--drafts' => 'Чарнавікі',
  'pt--draft-deletion' => 'Выдаленне чарнавіка',
  'pt--edit-draft' => 'Рэдагаванне чарнавіка',
  'gs--no-drafts' => 'Чарнавікоў няма.',
  'gs--not-published' => 'Не апублікавана',
  'gs--secret-link' => 'Сакрэтная спасылка',
  'gs--draft-will-be-deleted' => 'Чарнавік «$[draft]» будзе выдалены.',

  // comments
  'pt--new-comment' => 'Новы каментар',
  'pt--edit-comment' => 'Рэдагаванне каментара',
  'pt--reply-to-comment' => 'Адказ на каментар',
  'pt--edit-reply-to-comment' => 'Рэдагаванне адказа на каментар',
  'pt--unsubscription-done' => 'Атрымалася!',
  'pt--unsubscription-failed' => 'Не атрымалася',
  'gs--you-are-not-subscribed' => 'Здаецца, вы і так не падпісаны на каментары да гэтай нататкі',
  'gs--you-are-no-longer-subscribed' => 'Вы больш не падпісаны на каментары да нататкі',
  'gs--unsubscription-didnt-work' => 'Чамусьці адпіска не спрацавала',
  'gs--post-not-found' => 'Нататка не знойдзена',
  'gs--comment-too-long' => 'Занадта доўгі каментар',
  'gs--comment-too-long-description' => 'Вы даслалі занадта доўгі каментар, таму ён не быў захаваны.',
  'gs--comment-double-post' => 'Паўторны каментар',
  'gs--comment-double-post-description' => 'Вы даслалі каментар двойчы, захаваны быў толькі адзін.',
  'gs--comment-spam-suspect' => 'каментар выглядае як спам',
  'gs--comment-spam-suspect-description' => 'Прабачце, але робат вырашыў, што гэта спам, таму каментар ня быў дасланы.',
  'gs--you-are-already-subscribed' => 'Вы падпісаныя на каментары. Спасылка, каб адпісацца прыходзіць у кожным пісьме з новым каментаром.',
  'er--post-not-commentable' => 'Гэту нататку нельга каментаваць',
  'er--name-email-text-required' => 'І імя, і эл. адрас, і тэкст каментара абавязковы',
  'ff--notify-subscribers' => 'Даслаць па пошце каментатару і іншым падпісчыкам',
  'gs--your-comment' => 'Ваш каментар',
  'gs--sign-in-via' => 'Увайсці праз',
  'ff--full-name' => 'Імя і прозвішча',
  'ff--email' => 'Эл. пошта',
  'ff--subscribe-to-others-comments' => 'Атрымоўваць каментары іншых па пошце',
  'ff--text-of-your-comment' => 'Тэкст вашага каментара',
  'gs--n-comments' => '$[number.cardinal]',
  'gs--no-comments' => 'Няма каментароў',
  'gs--comments-all-one-new' => 'новы',
  'gs--comments-all-new' => 'новыя',
  'gs--comments-n-new' => '$[number.cardinal]',
  'mi--reply' => 'Адказаць',
  'mi--edit' => 'Рэдагаваць',
  'mi--highlight' => 'Выдзеліць',
  'mi--remove' => 'Прыбраць',
  'gs--replace' => 'Вярнуць',

  // tags
  'pt--tags' => 'Тэгі',
  'pt--tag' => 'Тэг',
  'pt--posts-tagged' => 'Нататкі з тэгам',
  'tt--edit-tag' => 'Рэдагаваць параметры і апісанне тэга',
  'gs--tagged' => 'з тэгам',
  'pt--tag-edit' => 'Рэдагаванне тэга',
  'pt--tag-delete' => 'Выдаленне тэга',
  'pt--posts-without-tags' => 'Нататкі без тэгаў',
  'gs--no-tags' => 'Тэгаў няма.',
  'gs--no-posts-without-tags' => 'Нататак без тэгаў няма.',
  'er--cannot-rename-tag' => 'Такое імя ці выгляд у адрасным радку ўжо выкарыстоўваецца іншым тэгам',
  'ff--tag-name' => 'Тэг',
  'ff--tag-urlname' => 'У адрасным радку',
  'ff--tag-page-title' => 'Загаловак старонкі',
  'ff--tag-introductory-text' => 'Уступны тэкст',
  'gs--tag-will-be-deleted-notes-remain' => 'Тэг «$[tag]» будзе выдалены з нататак, але самыя нататкі застануцца.',
  'gs--see-also' => 'Гл. таксама',
  'gs--tags-important' => 'важныя',
  'gs--tags-all' => 'усе',
  'gs--tags' => 'Тэгі',

  // most commented and favourites
  'pt--most-commented' => 'Нататкі, якія каментуюць$[period.periodname]',
  'pt--most-read' => 'Папулярнае$[period.periodname]',
  'nm--most-read' => 'Папулярнае',
  'pt--favourites' => 'Абранае',
  'nm--favourites' => 'Абранае',
  'gs--no-favourites' => 'Абранага няма.',
  'nm--read-next' => 'Далей',

  // generic posts pages
  'nm--pages' => 'Старонкі',
  'gs--page' => 'старонка',
  'gs--next-page' => 'наступная',
  'gs--prev-page' => 'папярэдняя',
  'gs--earlier' => 'Раней',
  'gs--later' => 'Пазней',
  'pt--n-posts' => '$[number.cardinal]',
  'pt--no-posts' => 'Няма нататак',

  // search
  'pt--search' => 'Пошук',
  'pt--search-query-empty' => 'Тэкст для пошуку пусты',
  'pt--search-query-too-short' => 'Занадта кароткі тэкст',
  'gs--found-for-query' => 'па запыту',
  'gs--search-query-empty' => 'Тэкст для пошуку пусты, напішыце што-небудзь',
  'gs--search-query-too-short' => 'Занадта кароткі тэкст, напішыце хоць 4 літары.',
  'gs--search-too-few-notes' => 'Пошук запрацуе, калі будзе больш нататак.',
  'gs--nothing-found' => 'Нічога не знойдзена.',
  'gs--many-posts' => 'Шмат нататак',
  'pt--search-results' => 'Вынікі пошуку',

  // password, sessions, settings
  'pt--password' => 'Пароль',
  'pt--password-for-blog' => 'Пароль для доступу да блогу',
  'ff--old-password' => 'Стары пароль',
  'ff--new-password' => 'Новы пароль',
  'fb--change' => 'Памяняць',
  'gs--password-changed' => 'Пароль зменены',
  'er--could-not-change-password' => 'Не атрымалася памяняць пароль',
  'er--no-password-entered' => 'Вы не ўвялі пароль',
  'er--wrong-password' => 'Няправільны пароль',
  'ff--displayed-as-plain-text' => 'адлюстроўваецца пры ўводзе',
  'er--settings-not-saved' => 'Наладка не захавана',
  'pt--password-reset' => 'Аднаўленне пароля',
  'gs--password-reset-link-sent-maybe' => 'Калі вы паказалі правільны адрас, спасылка скіду пароля адпраўлена па пошце',
  'gs--password-reset-link-saved' => 'Спасылка скіду пароля захавана ў файл /user/password-reset.psa у папкі блога на серверы.',
  'er--cannot-reset-password' => 'Немагчыма скінуць пароль: у Наладаванне не паказаная пошта. Звяжыцеся з адміністрацыяй.',
  'er--cannot-send-link-email-empty' => 'Немагчыма адправіць спасылку на скід пароля: адрас не паказаны',
  'gs--i-forgot' => 'Я забыўся',
  'em--password-reset-subject' => 'Скід пароля ў Эгее',
  'em--follow-this-link' => 'Перайдзіце па гэтай спасылцы, каб скінуць пароль:',

  'pt--sessions' => 'Адкрытыя сесіі',
  'gs--sessions-description' => 'Калі вы заходзіце пад сваім паролем на некалькіх прыладах ці з дапамогай некалькіх браўзераў, тут адлюстроўваецца спіс усіх такіх сесій. Калі нейкая з іх выклікае падазрэнні, завяршыце ўсе сесіі акрамя бягучай, а потым змяніце пароль ад блогу.',
  'gs--sessions-browser-or-device' => 'Браўзер ці прылада',
  'gs--sessions-when' => 'Калі',
  'gs--sessions-from-where' => 'Адкуль',
  'gs--locally' => 'лакальна',
  'gs--unknown' => 'невядомы',
  'fb--end-all-sessions-but-this' => 'Завяршыць усе сесіі акрамя бягучай',
  'gs--ua-iphone' => 'Айфон',
  'gs--ua-ipad' => 'Айпад',
  'gs--ua-opera' => 'Опера',
  'gs--ua-firefox' => 'Фаерфокс',
  'gs--ua-chrome' => 'Хром',
  'gs--ua-safari' => 'Сафары',
  'gs--ua-unknown' => 'Невядомы',
  'gs--ua-for-mac' => 'на Маку',

  'pt--settings' => 'Наладаванне',
  'ff--language' => 'Мова',
  'ff--theme' => 'Выгляд',
  'ff--theme-how-to' => 'Як стварыць сваю тэму?',
  'gs--theme-preview' => 'Прадпрагляд',
  'ff--posts' => 'Нататкі',
  'ff--respond-to-dark-mode' => 'Падтрымліваць Цёмны рэжым',
  'ff--items-per-page-after' => 'на старонцы',
  'ff--show-view-counts' => 'Паказваць лічыльнікі праглядаў',
  'ff--show-sharing-buttons' => 'Паказваць кнопкі адсылання ў соцсеткі',
  'ff--comments' => 'Каментары',
  'ff--comments-enable-by-default' => 'Дазваляць па змаўчанні ў новых нататках',
  'ff--comments-require-social-id' => 'Толькі пры ўваходзе праз сацсетку',
  'ff--only-for-recent-posts' => 'Толькі да новых нататак',
  'ff--send-by-email' => 'Дасылаць па пошце',
  'ff--yandex-metrika' => 'Яндекс.Метрика',
  'ff--google-analytics' => 'Гугль-Аналитика',
  'gs--password' => 'Пароль',
  'gs--db-connection' => 'Злучэнне з базай',
  'gs--get-backup' => 'Спампаваць апошні бэкапу',
  'gs--not-paid' => 'Егея не аплачана',
  'gs--paid-until' => 'Егея аплачана да',
  'gs--paid-period-ended' => 'Аплачаны перыяд скончыўся',
  'bt--learn-about-payment' => 'Даведацца аб аплаце',
  'gs--used' => 'Занята $[used] з $[total] МБ ($[percent]%)',
  'gs--used-all' => 'Занята ўсе месца: $[total] МБ',

  'ff--blog-title' => 'Назва блогу',
  'ff--subtitle' => 'Падзагаловак',
  'gs--remove-userpic' => 'Выдаліць фатаграфію',
  'ff--blog-description' => 'Апісанне блога',
  'gs--search-engines-social-networks-aggregators' => 'Для пошукавых сістэм, сацсетак і агрэгатараў',
  'ff--blog-author-picture-and-name' => 'Фота і імя аўтара',

  'pt--database' => 'База звестак',
  'ff--db-host' => 'Сервер',
  'ff--db-username-and-password' => 'Імя карыстальніка і пароль',
  'ff--db-name' => 'Назва базы',
  'fb--connect-to-this-db' => 'Падключыцца з гэтымі параметрамі',
  'er--cannot-save-data' => 'Не атрымоўваецца захаваць дадзеныя',
  'gs--drag-userpic-here' => 'Перацягніце сюды сваю выяву',

  // welcome
  'pt--welcome' => 'Гатова!',
  'pt--welcome-text-pre' => 'Блог створаны. ',
  'pt--welcome-text-href-write' => 'Напішыце нататку',
  'pt--welcome-text-or' => ' ці ',
  'pt--welcome-text-href-settings' => 'наладуйце што-небудзь',
  'pt--welcome-text-post' => '.',

  // need for password
  'gs--need-password' => 'Ваш пароль',
  'ff--public-computer' => 'Чужы кампутар',
  'gs--frontpage' => 'Галоўная старонка',

  // form buttons
  'fb--submit' => 'Адаслаць',
  'fb--save-changes' => 'Захаваць змяненні',
  'fb--save-and-preview' => 'Захаваць і паглядзець',
  'fb--publish' => 'Апублікаваць',
  'fb--publish-note' => 'Апублікаваць нататку',
  'fb--publish-note-at-this-time' => 'Апублікаваць нататку ў гэты час',
  'fb--select' => 'Выбраць',
  'fb--apply' => 'Дапасаваць',
  'fb--delete' => 'Выдаліць',
  'fb--sign-in' => 'Увайсці',
  'fb--sign-out' => 'Выйсці',
  'fb--send-link-by-email' => 'Адправіць спасылку па гэтым адрасе',

  // time
  'pt--default-timezone' => 'Часавы паяс па змаўчанні',
  'gs--e2-stores-each-posts-timezone' => 'Эгея захоўвае часавы паяс асобна для кожнай нататкі.',
  'gs--e2-autodetects-timezone' => 'Пры публікацыі часавы паяс звычайна вызначаецца аўтаматычна. А ў выпадку няўдачы выкарыстоўваецца абраны тут гадзінны паяс.',

  'tt--from-the-future' => 'З будучыні',
  'tt--now' => 'зараз',
  'tt--just-now' => 'Толькі што',
  'tt--one-minute-ago' => 'Хвіліну таму',
  'tt--minutes-ago' => '$[minutes.cardinal] таму',
  'tt--one-hour-ago' => 'Гадзіну таму',
  'tt--hours-ago' => '$[hours.cardinal] таму',
  'tt--today' => 'Сёння',
  'tt--today-at' => 'Сёння ў $[time]',

  'tt--seconds-short' => '$[value.cardinal]',
  'tt--minutes-short' => '$[value.cardinal]',
  'tt--hours-short' => '$[value.cardinal]',
  'tt--days-short' => '$[value.cardinal]',
  'tt--months-short' => '$[value.cardinal]',
  'tt--years-short' => '$[value.cardinal]',

  'tt--date' => '$[day] $[month.monthname.genitive]',
  'tt--date-and-time' => '$[day] $[month.monthname.genitive], $[time]',
  'tt--date-year-and-time' => '$[day] $[month.monthname.genitive] $[year], $[time]',

  'tt--zone-pt' => 'Ціхаакеанскі час',
  'tt--zone-mt' => 'Горны час',
  'tt--zone-ct' => 'Цэнтральны час',
  'tt--zone-et' => 'Усходні час',
  'tt--zone-gmt' => 'Час па Грынвічу',
  'tt--zone-cet' => 'Цэнтральнаеўрапейскі час',
  'tt--zone-eet' => 'Ўсходне-Еўрапейскі час',
  'tt--zone-msk' => 'Маскоўскі час',
  'tt--zone-ekt' => 'Чэлябінскі час',
  'gs--timezone-offset-hours' => 'г',
  'gs--timezone-offset-minutes' => 'хв',

  // mail
  'em--comment-new-to-author-subject' => '$[commenter] каментуе $[note-title]',
  'em--comment-new-to-public-subject' => '$[commenter] каментуе $[note-title]',
  'em--comment-reply-to-public-subject' => '$[blog-author] адказвае на каментар',
  'em--comment-reply' => '$[note-title] ($[blog-author] адказаў)',
  'em--created-automatically' => 'Пісьмо створана аўтаматычна.',
  'em--unsubscribe' => 'Адпісацца ад гэтага абмеркавання',
  'em--reply' => 'Адказаць',
  'em--comment-replied-at' => 'каментар, на які адказаў аўтар',

  // rss
  'gs--posts-tagged' => 'нататкі з тэгам',

  'gs--subscribe-to-blog' => 'Падпісацца на блог',
  
  // social networks
  'sn--twitter-verb' => 'Твітнуць',
  'sn--facebook-verb' => 'Падзяліцца',
  'sn--linkedin-verb' => 'Падзяліцца',
  'sn--vkontakte-verb' => 'Падзяліцца',
  'sn--telegram-verb' => 'Адаслаць',
  'sn--whatsapp-verb' => 'Адаслаць',
  'sn--pinterest-verb' => 'Запініць',

  // umacros
  'um--month' => '$[month.monthname]',
  'um--month-short' => '$[month.monthname.short]',
  'um--month-g' => '$[month.monthname.genitive]',

  // more strings
  'gs--subscribe' => 'Падпіска на блог',

  'gs--no-such-notes' => 'Нататак няма.',
  'pt--page-not-found' => 'Старонка не знойдзена',
  'gs--page-not-found' => 'Старонка не знойдзена.',

  'er--cannot-find-db' => 'Не магу знайсці базу звестак',
  'er--cannot-connect-to-db' => 'Не магу злучыцца з базай звестак',
  'er--mysql-version-too-old' => 'Версія базы звестак занадта старая ($[v1], патрэбна $[v2]+)',
  'er--error-occurred' => 'Адбылася памылка',
  'er--too-many-errors' => 'Занадта шмат памылак',
  'gs--rss' => 'РСС',

  'gs--pgt' => 'Час генерацыі',
  'gs--seconds-contraction' => 'с',
  'gs--updated-successfully' => 'Выканана абнаўленне з версіі $[from] да версіі $[to]',
  'gs--good-blogs' => 'Добрыя блогі ды сайты',

  'gs--range-separator' => '<span style="margin-left: .07em; letter-spacing: .07em">...</span>',
  
  'ab--menu-actions' => 'Дзеянні',

  '--secondary-language' => 'ru',

  );

}



function e2lstr_monthname ($number, $modifier) {
  if ($modifier == 'genitive') {
    $tmp = array (
      'снежня', 'студзеня', 'лютага', 'сакавіка', 'красавіка', 'травеня', 'чэрвеня',
      'ліпеня', 'жніўня', 'верасня', 'кастрычніка', 'лістапада', 'снежня', 'студзеня'
    );
  } elseif ($modifier == 'short') {
    $tmp = array (
      'сне', 'сту', 'лют', 'сак', 'кра', 'тра', 'чэр',
      'ліп', 'жні', 'вер', 'кас', 'ліс', 'сне', 'сту'
    );
  } else {
    $tmp = array (
      'Снежань', 'Студзень', 'Люты', 'Сакавік', 'Красавік', 'Травень', 'Чэрвень',
      'Ліпень', 'Жнівень', 'Верасень', 'Кастрычнік', 'Лістапад', 'Снежань', 'Студзень'
    );
  }
  return $tmp[(int) $number];
}


function e2lstr_periodname ($period) {
  /**/if ('year' == $period) return ' за год';
  elseif ('month' == $period) return ' за месяц';
  elseif ('week' == $period) return ' за тыдзень';
  elseif ('day' == $period) return ' за дзень';
  else return ''; // 'усю гісторыю';
}


function e2lstr_cardinal ($number, $modifier, $string_id) {

  $what = $number;
  if ($string_id == 'pt--n-posts') $what = $number .' натат(ка,кі,ак)';
  if ($string_id == 'tt--minutes-ago') $what = $number .' хвілін(у,ы,)';
  if ($string_id == 'tt--hours-ago') $what = $number .' гадзін(ы,)';
  if ($string_id == 'gs--n-comments') $what = $number .' каментар(,а,оў)';
  if ($string_id == 'gs--comments-n-new') $what = $number .' новы(,х,х)';

  if ($string_id == 'tt--seconds-short') $what = $number .' с';
  if ($string_id == 'tt--minutes-short') $what = $number .' хв';
  if ($string_id == 'tt--hours-short') $what = $number .' ч';
  if ($string_id == 'tt--days-short') $what = $number .' (дз,дн,дн)';
  if ($string_id == 'tt--months-short') $what = $number .' мес';
  if ($string_id == 'tt--years-short') $what = $number .' (год,гады,гад)';

  return e2_decline_for_number ($what);

}



?>
