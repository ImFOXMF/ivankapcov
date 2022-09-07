<?php // mui

// display_name = Français

function e2l_load_strings () {

  return array (

  // engine
  'e2--vname-aegea' => 'Aegea',
  'e2--release' => 'version',
  'e2--powered-by' => 'Développé par',
  'e2--default-blog-title' => 'Mon blog',
  'e2--default-blog-author' => 'Auteur du blog',
  'e2--website-host' => 'blogengine.me',
  
  // installer
  'pt--install' => 'Installer Aegea',
  'gs--user-fixes-needed' => 'Hum, quelque chose est à réparer.',
  'gs--following-folders-missing' => 'Les répertoires suivants manquent dans le package :',
  'gs--could-not-create-them-automatically' => 'Impossible de les créer automatiquement en raison d’un accès refusé. Veuillez télécharger l’archive entière sur le serveur.',
  'gs--and-reload-installer' => 'Et rechargez l’installateur',
  'fb--begin' => 'Veuillez commencer à bloguer',
  'fb--retry' => 'Veuillez essayer de nouveau',
  'gs--db-parameters' => 'Paramètres de la base de données que votre fournisseur d’hébergement vous a présentés',
  'gs--ask-hoster-how-to-create-db' => 'Demandez à votre hébergeur comment créer une base de données, si nécessaire',
  'er--double-check-db-params' => 'Veuillez vérifier les paramètres de la base de données',
  'gs--instantiated-version' => 'Version instanciée',
  'gs--database' => 'Base de données',
  'gs--password-for-blog' => 'Mot de passe que vous souhaitez utiliser pour accéder à votre blog',
  'gs--data-exists' => 'Il y a déjà un blog dans cette base de données. L’installateur va simplement s’y connecter.',
  'er--db-data-incomplete' => 'Les données de cette base de données sont incomplètes.',
  'er--db-data-incomplete-install' => 'Les données de cette base de données sont incomplètes. Elle a probablement été utilisée avec une version différente d’Aegea. Installez la version d’Aegea avec laquelle ces données ont été créées, puis mettez-la à jour si nécessaire. Pour une installation propre, veuillez fournir une base de données propre',

  // diags
  'et--fix-permissions-on-server' => 'Veuillez configurer les autorisations sur le serveur',
  'gs--enable-write-permissions-for-the-following' => 'Veuillez activer les autorisations d’écriture ici :',
  
  // sign in
  'pt--sign-in' => 'Connection',
  'er--cannot-write-auth-data' => 'Impossible d’inscrire les données d’authentification',

  // archive
  'pt--nth-year' => 'L’an $[year]',
  'pt--nth-month-of-nth-year' => '$[month.monthname] $[year]',
  'pt--nth-day-of-nth-month-of-nth-year' => 'Le $[day.ordinal] $[month.monthname.long] $[year]',
  'gs--nth-month-of-nth-year' => '$[month.monthname] $[year]',
  'gs--nth-day-of-nth-month-of-nth-year' => '$[month.monthname] $[day], $[year]',
  'gs--everything' => 'Tout',
  'gs--part-x-of-y' => 'partie $[part] de $[of]',
  
  // posts
  'ln--new-post' => 'Nouveau',
  'bt--close-comments-to-post' => 'Interdire les commentaires sur ce billet',
  'bt--open-comments-to-post' => 'Permettre les commentaires sur ce billet',
  'pt--new-post' => 'Nouveau billet',
  'pt--edit-post' => 'Modifier le billet',
  'er--post-must-have-title-and-text' => 'Un billet doit comprendre le titre et le texte',
  'er--error-updating-post' => 'Erreur lors de la mise à jour de ce billet',
  'er--error-deleting-post-tag-info' => 'Erreur lors de la suppression des informations de tag de ce billet',
  'er--wrong-datetime-format' => 'Format de date et d’heure incorrect. Doit être “jj.mm.aaaa hh:mm:ss”',
  'er--cannot-create-thumbnail' => 'Impossible de créer la miniature',
  'er--cannot-upload' => 'Impossible de charger le fichier',
  'ff--title' => 'Titre',
  'ff--text' => 'Texte',
  'ff--saving' => 'Sauvegarde en cours',
  'ff--save' => 'Sauvegardé',
  'ff--summary' => 'Résumé',
  'ff--tags' => 'Balises',
  'ff--alias' => 'Alias',
  'ff--change-time' => 'Changer l’heure',
  'ff--delete' => 'Supprimer',
  'ff--edit' => 'Modifier',
  'fb--hide' => 'Cacher',
  'fb--show' => 'Rendre visible',
  'fb--withdraw' => 'Reconvertir en brouillon',
  'ff--will-be-published' => 'Sera publié',
  'ff--is-published' => 'Publié',
  'ff--at-address' => 'à l’adresse',
  'gs--no-notes' => 'Pas de billets.',
  'gs--will-be-published' => 'Sera publié',

  // see NiceError.php!
  'er--supported-only-png-jpg-gif' => 'Seules les images png, jpg et gif sont prises en charge',
  'er--unsupported-file' => 'Seuls les images png, jpg, gif et svg, vidéos mp4 et mov et les fichiers audio mp3 sont pris en charge',

  'ff--gmt-offset' => 'Décalage GMT',
  'ff--with-dst' => '+1 en été',
  'ff--post-time' => 'Heure de publication',
  
  'pt--post-deletion' => 'Suppression du billet',
  'gs--post-will-be-deleted' => 'Le billet “$[post]” sera supprimé avec tous les commentaires.',

  'gs--post-will-be-hidden' => 'Le billet restera en place, mais ne sera visible que par vous. D’autres ne verront même y pas par un lien direct. Peut être rendu visible à nouveau',
  'gs--post-will-be-withdrawn' => 'Les commentaires seront supprimés, la date de publication sera oubliée. Peut être republié',

  // uploads
  'gs--kb' => 'Ko',
  'mi--upload-file' => 'Charger le fichier',
  'mi--delete' => 'Supprimer',
  'mi--insert' => 'Insérer',

  // frontpage 
  'nm--posts' => 'Billets',
  'gs--next-posts' => 'le suivant',
  'gs--prev-posts' => 'le précédent',
  'gs--unsaved-changes' => 'Modifications non sauvegardées :',
  
  // drafts
  'ln--drafts' => 'Brouillons',
  'pt--drafts' => 'Brouillons',
  'pt--draft-deletion' => 'Suppression du brouillon',
  'pt--edit-draft' => 'Modification du brouillon',
  'gs--no-drafts' => 'Pas de brouillons.',
  'gs--not-published' => 'Non publié',
  'gs--secret-link' => 'Lien caché',
  'gs--draft-will-be-deleted' => 'Le brouillon “$[draft]” sera supprimé.',
  
  // comments
  'pt--new-comment' => 'Nouveau commentaire',
  'pt--edit-comment' => 'Modifier le commentaire',
  'pt--reply-to-comment' => 'Répondre au commentaire',
  'pt--edit-reply-to-comment' => 'Modifier la réponse au commentaire',
  'pt--unsubscription-done' => 'Accompli',
  'pt--unsubscription-failed' => 'Non accompli',
  'gs--you-are-no-longer-subscribed' => 'Vous n’êtes plus abonné aux commentaires du billet',
  'gs--you-are-not-subscribed' => 'Il semble que vous ne soyez pas abonné aux commentaires de ce billet',
  'gs--unsubscription-didnt-work' => 'Impossible de vous désinscrire pour une raison inconnue',
  'gs--post-not-found' => 'Billet pas trouvé',
  'gs--comment-too-long' => 'Le commentaire est trop long',
  'gs--comment-too-long-description' => 'Vous avez soumis un très long commentaire, et il n’a pas été publié.',
  'gs--comment-double-post' => 'Double commentaire',
  'gs--comment-double-post-description' => 'Vous avez soumis un commentaire plusieurs fois, un seul a été publié.',
  'gs--comment-spam-suspect' => 'Le commentaire ressemble à du spam',
  'gs--comment-spam-suspect-description' => 'Désolé, notre robot a décidé que ce commentaire était du spam, et il n’a pas été posté.',
  'gs--you-are-already-subscribed' => 'Vous êtes abonné aux commentaires. Le lien de désinscription est disponible dans chaque message e-mail avec un nouveau commentaire.',
  'er--post-not-commentable' => 'Ce billet ne peut pas être commenté',
  'er--name-email-text-required' => 'Le nom, l’adresse de courriel et le texte du commentaire sont tous requis',
  'ff--notify-subscribers' => 'Avertisser l’auteur et les autres abonnés par le courriel',
  'gs--your-comment' => 'Votre commentaire',
  'gs--sign-in-via' => 'Connection via',
  'ff--full-name' => 'Nom complet',
  'ff--email' => 'Adresse de courriel',
  'ff--subscribe-to-others-comments' => 'Obtenir d’autres commentaires par le courriel',
  'ff--text-of-your-comment' => 'Texte de votre commentaire',
  'gs--n-comments' => '$[number.cardinal]',
  'gs--no-comments' => 'Pas de commentaires',
  'gs--comments-all-one-new' => 'nouveau',
  'gs--comments-all-new' => 'nouveau',
  'gs--comments-n-new' => '$[number.cardinal]',
  'mi--reply' => 'Répondre',
  'mi--edit' => 'Modifier',
  'mi--highlight' => 'Surligner',
  'mi--remove' => 'Supprimer',
  'gs--replace' => 'Replacer',

  // tags
  'pt--tags' => 'Balises',
  'pt--tag' => 'Balise',
  'pt--posts-tagged' => 'Billets balisés',
  'tt--edit-tag' => 'Modifier les paramètres et la description de la balise',
  'gs--tagged' => 'balisé',
  'pt--tag-edit' => 'Modifier la balise',
  'pt--tag-delete' => 'Supprimer la balise',
  'pt--posts-without-tags' => 'Billets non balisés',
  'gs--no-tags' => 'Pas de balises.',
  'gs--no-posts-without-tags' => 'Pas de billets sans balises.',
  'er--cannot-rename-tag' => 'Ce nom ou ce nom d’URL est déjà utilisé par une autre balise',
  'ff--tag-name' => 'Balise',
  'ff--tag-urlname' => 'Nom d’URL',
  'ff--tag-page-title' => 'Titre de la page',
  'ff--tag-introductory-text' => 'Texte d’introduction',
  'gs--tag-will-be-deleted-notes-remain' => 'La balise “$[tag]” sera supprimée des billets, mais les billets resteront.',
  'gs--see-also' => 'Voir aussi',
  'gs--tags-important' => 'importants',
  'gs--tags-all' => 'tout',
  'gs--tags' => 'Balises',
  
  // most commented and favourites
  'pt--most-commented' => 'Les plus commentés$[period.periodname]',
  'pt--most-read' => 'Populaire$[period.periodname]',
  'nm--most-read' => 'Populaire',
  'pt--favourites' => 'Choisi',
  'nm--favourites' => 'Choisi',
  'gs--no-favourites' => 'Pas de billets choisis.',
  'nm--read-next' => 'Suivant',
  
  // generic posts pages
  'nm--pages' => 'Pages',
  'gs--page' => 'page',
  'gs--next-page' => 'la suivante',
  'gs--prev-page' => 'la précédente',
  'gs--earlier' => 'Antérieurement',
  'gs--later' => 'Postérieurement',
  'pt--n-posts' => '$[number.cardinal]',
  'pt--no-posts' => 'Pas de billets',
  
  // search
  'pt--search' => 'Recherche',
  'pt--search-query-empty' => 'Le texte de recherche est vide',
  'pt--search-query-too-short' => 'Le texte de recherche est trop court',
  'gs--found-for-query' => 'pour requête',
  'gs--search-query-empty' => 'Le texte de recherche est vide, veuillez saisir quelque chose.',
  'gs--search-query-too-short' => 'Le texte de recherche est trop court, veuillez saisir au moins 4 lettres.',
  'gs--search-too-few-notes' => 'La recherche fonctionnera lorsque plus de billets seront publiés.',
  'gs--nothing-found' => 'Rien n’a été trouvé.',
  'gs--many-posts' => 'Plusieurs billets',
  'pt--search-results' => 'Résultats de la recherche',
  
  // password, sessions, settings
  'pt--password' => 'Mot de passe',
  'pt--password-for-blog' => 'Mot de passe pour le blog',
  'ff--old-password' => 'Ancien mot de passe',
  'ff--new-password' => 'Nouveau mot de passe',
  'fb--change' => 'Changer',
  'gs--password-changed' => 'Le mot de passe est changé',
  'er--could-not-change-password' => 'Impossible de changer le mot de passe',
  'er--no-password-entered' => 'Vous n’avez pas saisi le mot de passe',
  'er--wrong-password' => 'Mauvais mot de passe',
  'ff--displayed-as-plain-text' => 'affiché en texte brut',
  'er--settings-not-saved' => 'Paramètres non enregistrés',
  'pt--password-reset' => 'Réinitialisation du mot de passe',
  'gs--password-reset-link-sent-maybe' => 'Si l’adresse était correcte, le lien pour réinitialiser votre mot de passe a été envoyé par courriel',
  'gs--password-reset-link-saved' => 'Le lien pour réinitialiser votre mot de passe a été enregistré dans le fichier /user/password-reset.psa stocké dans le répertoire de votre blog sur le serveur.',
  'er--cannot-reset-password' => 'Impossible de réinitialiser le mot de passe: aucune adresse de courriel spécifiée dans les paramètres. À contacter l’administrateur.',
  'er--cannot-send-link-email-empty' => 'Impossible d’envoyer le lien de réinitialisation du mot de passe: aucune adresse du courriel spécifiée',
  'gs--i-forgot' => 'J’ai oublié',
  'em--password-reset-subject' => 'Réinitialisation du mot de passe d’Aegea',
  'em--follow-this-link' => 'Suivez ce lien pour réinitialiser votre mot de passe :',
  
  'pt--sessions' => 'Sessions ouvertes',
  'gs--sessions-description' => 'Lorsque vous vous connectez en utilisant votre mot de passe sur plusieurs appareils ou avec plusieurs navigateurs, cette page affiche la liste de toutes ces sessions. Si l’une d’elles vous semble suspecte, mettez fin à toutes les sessions sauf celle-ci, puis changez votre mot de passe.',
  'gs--sessions-browser-or-device' => 'Navigateur ou appareil',
  'gs--sessions-when' => 'Quand',
  'gs--sessions-from-where' => 'D’où',
  'gs--locally' => 'localement',
  'gs--unknown' => 'inconnu',
  'fb--end-all-sessions-but-this' => 'Mettre fin à toutes les sessions sauf celle-ci',
  'gs--ua-iphone' => 'iPhone',
  'gs--ua-ipad' => 'iPad',
  'gs--ua-opera' => 'Opera',
  'gs--ua-firefox' => 'Firefox',
  'gs--ua-chrome' => 'Chrome',
  'gs--ua-safari' => 'Safari',
  'gs--ua-unknown' => 'Inconnu',
  'gs--ua-for-mac' => 'sur Mac',

  'pt--settings' => 'Préférences',
  'ff--language' => 'Langue',
  'ff--theme' => 'Thème',
  'ff--theme-how-to' => 'Comment créer un thème ?',
  'gs--theme-preview' => 'Aperçu',
  'ff--posts' => 'Billets',
  'ff--respond-to-dark-mode' => 'Prise en charge du Mode sombre (Dark Mode)',
  'ff--items-per-page-after' => 'par page',
  'ff--show-view-counts' => 'Afficher le nombre de vues',
  'ff--show-sharing-buttons' => 'Afficher les boutons de partage social',
  'ff--comments' => 'Commentaires',
  'ff--comments-enable-by-default' => 'Autoriser par défaut dans les nouveaux billets',
  'ff--comments-require-social-id' => 'Identification depuis un réseau social requise',
  'ff--only-for-recent-posts' => 'Uniquement pour les billets récents',
  'ff--send-by-email' => 'Envoyer par courriel',
  'ff--yandex-metrika' => 'Yandex.Metrika',
  'ff--google-analytics' => 'Google Analytics',
  'gs--password' => 'Mot de passe',
  'gs--db-connection' => 'Connection à la base de données',
  'gs--get-backup' => 'Obtenir la dernière sauvegarde',
  'gs--not-paid' => 'Aegea n’est pas payée',
  'gs--paid-until' => 'Aegea est payée jusqu’au',
  'gs--paid-period-ended' => 'Période payée terminée',
  'bt--learn-about-payment' => 'Apprendre au sujet du paiement',
  'gs--used' => 'Utilisé $[used] sur $[total] Mo ($[percent]%)',
  'gs--used-all' => 'Tout l’espace est utilisé : $[total] Mo',
  
  'ff--blog-title' => 'Titre du blog',
  'ff--subtitle' => 'Sous-titre',
  'gs--remove-userpic' => 'Retirer photo',
  'ff--blog-description' => 'Description du blog',
  'gs--search-engines-social-networks-aggregators' => 'Pour les moteurs de recherche, les réseaux sociaux et les agrégateurs',
  'ff--blog-author-picture-and-name' => 'Image et nom de l’auteur',

  'pt--database' => 'Base de données',
  'ff--db-host' => 'Serveur',
  'ff--db-username-and-password' => 'Nom d’utilisateur et mot de passe',
  'ff--db-name' => 'Nom de la base de données',
  'fb--connect-to-this-db' => 'Connection utilisant ces paramètres',
  'er--cannot-save-data' => 'Impossible de sauvegarder les données',
  'gs--drag-userpic-here' => 'Faites glisser votre photo ici',

  // welcome
  'pt--welcome' => 'Creé !',
  'pt--welcome-text-pre' => 'Votre blog est créé. ',
  'pt--welcome-text-href-write' => 'Écrivez un billet',
  'pt--welcome-text-or' => ' ou ',
  'pt--welcome-text-href-settings' => 'configurez les options du blog',
  'pt--welcome-text-post' => '.',

  // need for password
  'gs--need-password' => 'Votre mot de passe',
  'ff--public-computer' => 'Ordinateur public',
  'gs--frontpage' => 'Domicile',
  
  // form buttons
  'fb--submit' => 'Soumettre',
  'fb--save-changes' => 'Enregistrer les changements',
  'fb--save-and-preview' => 'Enregistrer et prévisualiser',
  'fb--publish' => 'Publier',
  'fb--publish-note' => 'Publier le billet',
  'fb--publish-note-at-this-time' => 'Publier le billet à ce moment',
  'fb--select' => 'Choisir',
  'fb--apply' => 'Appliquer',
  'fb--delete' => 'Supprimer',
  'fb--sign-in' => 'Connection',
  'fb--sign-out' => 'Déconnection',
  'fb--send-link-by-email' => 'Envoyer le lien à cette adresse de courriel',
  
  // time
  'pt--default-timezone' => 'Fuseau horaire par défaut',
  'gs--e2-stores-each-posts-timezone' => 'Aegea stocke le fuseau horaire de chaque billet séparément.',
  'gs--e2-autodetects-timezone' => 'Lors de la publication d’un billet, le fuseau horaire est généralement détecté automatiquement. En cas d’échec, le fuseau horaire sélectionné ici sera utilisé.',

  'tt--from-the-future' => 'Depuis le futur',
  'tt--now' => 'Maintenant',
  'tt--just-now' => 'Tout à l’heure',
  'tt--one-minute-ago' => 'Il y a une minute',
  'tt--minutes-ago' => 'Il y a $[minutes.cardinal] ',
  'tt--one-hour-ago' => 'Il y a une heure',
  'tt--hours-ago' => 'Il y a $[hours.cardinal] ',
  'tt--today' => 'Aujourd’hui',
  'tt--today-at' => 'Aujourd’hui à $[time]',

  'tt--seconds-short' => '$[value.cardinal]',
  'tt--minutes-short' => '$[value.cardinal]',
  'tt--hours-short' => '$[value.cardinal]',
  'tt--days-short' => '$[value.cardinal]',
  'tt--months-short' => '$[value.cardinal]',
  'tt--years-short' => '$[value.cardinal]',

  'tt--date' => '$[month.monthname.short] $[day]',
  'tt--date-and-time' => '$[month.monthname.short] $[day], $[time]',
  'tt--date-year-and-time' => '$[month.monthname.short] $[day], $[year], $[time]',

  'tt--zone-pt' => 'Fuseau horaire du Pacifique',
  'tt--zone-mt' => 'Fuseau horaire de Mountain',
  'tt--zone-ct' => 'Fuseau horaire Central',
  'tt--zone-et' => 'Fuseau horaire de la Côte Est',
  'tt--zone-gmt' => 'Fuseau horaire de Greenwich',
  'tt--zone-cet' => 'Fuseau horaire d’Europe Centrale',
  'tt--zone-eet' => 'Fuseau horaire d’Europe de l’Est',
  'tt--zone-msk' => 'Fuseau horaire de Moscou',
  'tt--zone-ekt' => 'Fuseau horaire de Tcheliabinsk',
  'gs--timezone-offset-hours' => 'h',
  'gs--timezone-offset-minutes' => 'min',

  // mail
  'em--comment-new-to-author-subject' => '$[commenter] commente $[note-title]',
  'em--comment-new-to-public-subject' => '$[commenter] commente $[note-title]',
  'em--comment-reply-to-public-subject' => '$[blog-author] répond au commentaire',
  'em--comment-reply' => '$[note-title] ($[blog-author] a répondu)',
  'em--created-automatically' => 'Ce message a été créé automatiquement',
  'em--unsubscribe' => 'Me désinscrire de cette discussion',
  'em--reply' => 'Répondre',
  'em--comment-replied-at' => 'Commentaire auquel l’auteur a répondu',

  // rss
  'gs--posts-tagged' => 'billets balisés',
  
  'gs--subscribe-to-blog' => 'M’abonner à ce blog',

  // social networks
  'sn--twitter-verb' => 'Tweeter',
  'sn--facebook-verb' => 'Partager',
  'sn--linkedin-verb' => 'Partager',
  'sn--vkontakte-verb' => 'Partager',
  'sn--telegram-verb' => 'Envoyer',
  'sn--whatsapp-verb' => 'Envoyer',
  'sn--pinterest-verb' => 'Épingler',

  // umacros
  'um--month' => '$[month.monthname]',
  'um--month-short' => '$[month.monthname.short]',
  'um--month-g' => '$[month.monthname]',
  
  // more strings
  'gs--subscribe' => 'M’abonner à ce blog',
  
  'gs--no-such-notes' => 'Pas de billets.',
  'pt--page-not-found' => 'Page non trouvée',
  'gs--page-not-found' => 'Page non trouvée.',
  
  'er--cannot-find-db' => 'Impossible de trouver la base de données',
  'er--cannot-connect-to-db' => 'Impossible de se connecter à la base de données',
  'er--mysql-version-too-old' => 'La version de la base de données MySQL est trop ancienne ($[v1], $[v2]+ est requise)',
  'er--error-occurred' => 'Erreur est survenue',
  'er--too-many-errors' => 'Trop d’erreurs',
  'gs--rss' => 'RSS',
  
  'gs--updated-successfully' => 'Mise à jour réussie à partir de la version $[from] à la version $[to]',
  'gs--pgt' => 'Temps de génération',
  'gs--seconds-contraction' => 's',
  'gs--good-blogs' => 'Bons blogs et sites',

  'gs--range-separator' => '–',
  
  'ab--menu-actions' => 'Actions',

  '--secondary-language' => 'en',

  );

}



function e2lstr_monthname ($number, $modifier) {
  if ($modifier == 'long') {
    $tmp = array (
      'décembre', 'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
      'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre', 'janvier'
    );
  } elseif ($modifier == 'short') {
    $tmp = array (
      'déc', 'jan', 'fév', 'mars', 'avr', 'mai', 'juin',
      'juil', 'août', 'sep', 'oct', 'nov', 'déc', 'jan'
    );
  } else {
    $tmp = array (
      'Décembre', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
      'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre', 'Janvier'
    );
  }
  return $tmp[(int) $number];
}


function e2lstr_periodname ($period) {
  /**/if ('year' == $period) return ' durant l’année';
  elseif ('month' == $period) return ' durant le mois';
  elseif ('week' == $period) return ' durant la semaine';
  elseif ('day' == $period) return ' durant la journée';
  else return ''; // 'toute l’histoire';
}


function e2lstr_ordinal ($number) {
  if ($number == 1) return $number. 'ᵉʳ';
  return $number;
}



function e2lstr_cardinal ($number, $modifier, $string_id) {
  $s = ($number > 1);

  $result = $number;
  if ($string_id == 'pt--n-posts') $result = $number .' billet'. ($s?'s':'');
  if ($string_id == 'tt--minutes-ago') $result = $number .' minute'. ($s?'s':'');
  if ($string_id == 'tt--hours-ago') $result = $number .' heure'. ($s?'s':'');
  if ($string_id == 'gs--n-comments') $result = $number .' commentaire'. ($s?'s':'');
  if ($string_id == 'gs--comments-n-new') $result = $number .' nouveau'. ($s?'x':'');
  
  if ($string_id == 'tt--seconds-short') $result = $number .' s';
  if ($string_id == 'tt--minutes-short') $result = $number .' min';
  if ($string_id == 'tt--hours-short') $result = $number .' h';
  if ($string_id == 'tt--days-short') $result = $number .' j';
  if ($string_id == 'tt--months-short') $result = $number .' mois';
  if ($string_id == 'tt--years-short') $result = $number .' an';

  return $result;
  
}



?>