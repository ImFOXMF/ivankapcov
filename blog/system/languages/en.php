<?php // mui

// display_name = English

function e2l_load_strings () {

  return array (

  // engine
  'e2--vname-aegea' => 'Aegea',
  'e2--release' => 'release',
  'e2--powered-by' => 'Powered by',
  'e2--default-blog-title' => 'My blog',
  'e2--default-blog-author' => 'Blog author',
  'e2--website-host' => 'blogengine.me',
  
  // installer
  'pt--install' => 'Install Aegea',
  'gs--user-fixes-needed' => 'OK, something has to be fixed.',
  'gs--following-folders-missing' => 'The following folders are missing from the package:',
  'gs--could-not-create-them-automatically' => 'Could not create them automatically due to denied access. Please upload the whole package to the server.',
  'gs--and-reload-installer' => 'And reload the installer',
  'fb--begin' => 'Start blogging',
  'fb--retry' => 'Try again',
  'gs--db-parameters' => 'Database parameters that your hosting provider has given you',
  'gs--ask-hoster-how-to-create-db' => 'Ask your hosting provider how to create database, if necessary',
  'er--double-check-db-params' => 'Please double check database parameters',
  'gs--instantiated-version' => 'Instantiated version',
  'gs--database' => 'Database',
  'gs--password-for-blog' => 'Password you’d like to use to access your blog',
  'gs--data-exists' => 'There is a blog in this database already. Installer will just connect to it.',
  'er--db-data-incomplete' => 'The data in this database is incomplete.',
  'er--db-data-incomplete-install' => 'The data in this database is incomplete. Probably it was used with a different version of Aegea. Install the version of Aegea which this data was created with, then update if necessary. For clean install, please provide a clean database',

  // diags
  'et--fix-permissions-on-server' => 'Fix the permissions on server',
  'gs--enable-write-permissions-for-the-following' => 'Please enable write permissions here:',
  
  // sign in
  'pt--sign-in' => 'Sign in',
  'er--cannot-write-auth-data' => 'Cannot write authentication data',

  // archive
  'pt--nth-year' => 'The year $[year]',
  'pt--nth-month-of-nth-year' => '$[month.monthname] of the year $[year]',
  'pt--nth-day-of-nth-month-of-nth-year' => 'The $[day.ordinal] of $[month.monthname], $[year]',
  'gs--nth-month-of-nth-year' => '$[month.monthname] $[year]',
  'gs--nth-day-of-nth-month-of-nth-year' => '$[month.monthname.short] $[day], $[year]',
  'gs--everything' => 'All',
  'gs--part-x-of-y' => 'part $[part] of $[of]',
  
  // posts
  'ln--new-post' => 'New',
  'bt--close-comments-to-post' => 'Disallow comments to this post',
  'bt--open-comments-to-post' => 'Allow comments to this post',
  'pt--new-post' => 'New post',
  'pt--edit-post' => 'Edit post',
  'er--post-must-have-title-and-text' => 'A post must have a title and a text',
  'er--error-updating-post' => 'Error updating this post',
  'er--error-deleting-post-tag-info' => 'Error deleting this post’s tag information',
  'er--wrong-datetime-format' => 'Wrong date & time format. Must be “dd.mm.yyyy hh:mm:ss”',  
  'er--cannot-create-thumbnail' => 'Can’t create thumbnail',
  'er--cannot-upload' => 'Can’t upload file',
  'ff--title' => 'Title',
  'ff--text' => 'Text',
  'ff--saving' => 'Saving...',
  'ff--save' => 'Save',
  'ff--summary' => 'Summary',
  'ff--tags' => 'Tags',
  'ff--alias' => 'Alias',
  'ff--change-time' => 'Change time',
  'ff--delete' => 'Delete',
  'ff--edit' => 'Edit',
  'fb--hide' => 'Hide',
  'fb--show' => 'Make visible',
  'fb--withdraw' => 'Convert back into draft',
  'ff--will-be-published' => 'Will be published',
  'ff--is-published' => 'Published',
  'ff--at-address' => 'at address',
  'gs--no-notes' => 'There are no posts.',
  'gs--will-be-published' => 'Will be published',

  // see NiceError.php!
  'er--supported-only-png-jpg-gif' => 'Only png, jpg, & gif images are supported',
  'er--unsupported-file' => 'Only png, jpg, gif, & svg images, mp4 & mov videos, and mp3 audio files are supported',

  'ff--gmt-offset' => 'GMT offset',
  'ff--with-dst' => '+1 in summer',
  'ff--post-time' => 'Post time',
  
  'pt--post-deletion' => 'Post deletion',
  'gs--post-will-be-deleted' => 'The post “$[post]” will be deleted with all comments.',

  'gs--post-will-be-hidden' => 'The post will remain in place, but will be visible only to you. Others won’t be able to access it even by a direct link. You can show it back later',
  'gs--post-will-be-withdrawn' => 'Comments will be deleted, the publish date forgotten. You can publish again later',

  // uploads
  'gs--kb' => 'KB',
  'mi--upload-file' => 'Upload file',
  'mi--delete' => 'Delete',
  'mi--insert' => 'Insert',

  // frontpage 
  'nm--posts' => 'Posts',
  'gs--next-posts' => 'next',
  'gs--prev-posts' => 'previous',
  'gs--unsaved-changes' => 'Changes not saved:',
  
  // drafts
  'ln--drafts' => 'Drafts',
  'pt--drafts' => 'Drafts',
  'pt--draft-deletion' => 'Draft deletion',
  'pt--edit-draft' => 'Edit draft',
  'gs--no-drafts' => 'There are no drafts.',
  'gs--not-published' => 'Not published',
  'gs--secret-link' => 'Secret link',
  'gs--draft-will-be-deleted' => 'The draft “$[draft]” will be deleted.',
  
  // comments
  'pt--new-comment' => 'New comment',
  'pt--edit-comment' => 'Edit comment',
  'pt--reply-to-comment' => 'Reply to comment',
  'pt--edit-reply-to-comment' => 'Edit comment reply',
  'pt--unsubscription-done' => 'Done',
  'pt--unsubscription-failed' => 'Not done',
  'gs--you-are-no-longer-subscribed' => 'You are no longer subscribed to comments of post',
  'gs--you-are-not-subscribed' => 'Looks like you aren’t subscribed to this post’s comments',
  'gs--unsubscription-didnt-work' => 'Couldn’t unsubscribe you for unknown reason',
  'gs--post-not-found' => 'Post not found',
  'gs--comment-too-long' => 'Comment too long',
  'gs--comment-too-long-description' => 'You’ve submitted a very long comment, and it was not posted.',
  'gs--comment-double-post' => 'Double comment',
  'gs--comment-double-post-description' => 'You’ve submitted a comment more than once, only one was posted.',
  'gs--comment-spam-suspect' => 'Comment looks like spam',
  'gs--comment-spam-suspect-description' => 'Sorry, our robot has decided that this comment is spam, and it was not posted.',
  'gs--you-are-already-subscribed' => 'You are subscribed to comments. The link to unsubscribe is available in every mail with a new comment.',
  'er--post-not-commentable' => 'This post cannot be commented',
  'er--name-email-text-required' => 'Name, e-mail and comment text are all required',
  'ff--notify-subscribers' => 'Notify sender and other subscribers by email',
  'gs--your-comment' => 'Your comment',
  'gs--sign-in-via' => 'Sign in via',
  'ff--full-name' => 'Full name',
  'ff--email' => 'Email',
  'ff--subscribe-to-others-comments' => 'Get other comments by email',
  'ff--text-of-your-comment' => 'Text of your comment',
  'gs--n-comments' => '$[number.cardinal]',
  'gs--no-comments' => 'No comments',
  'gs--comments-all-one-new' => 'new',
  'gs--comments-all-new' => 'new',
  'gs--comments-n-new' => '$[number.cardinal]',
  'mi--reply' => 'Reply',
  'mi--edit' => 'Edit',
  'mi--highlight' => 'Highlight',
  'mi--remove' => 'Remove',
  'gs--replace' => 'Put back',

  // tags
  'pt--tags' => 'Tags',
  'pt--tag' => 'Tag',
  'pt--posts-tagged' => 'Posts tagged',
  'tt--edit-tag' => 'Edit tag parameters and description',
  'gs--tagged' => 'tagged',
  'pt--tag-edit' => 'Edit tag',
  'pt--tag-delete' => 'Delete tag',
  'pt--posts-without-tags' => 'Posts without tags',
  'gs--no-tags' => 'There are no tags.',
  'gs--no-posts-without-tags' => 'There are no posts without tags.',
  'er--cannot-rename-tag' => 'This name or URL name are already in use by another tag',
  'ff--tag-name' => 'Tag',
  'ff--tag-urlname' => 'Name in URL',
  'ff--tag-page-title' => 'Page title',
  'ff--tag-introductory-text' => 'Introductory text',
  'gs--tag-will-be-deleted-notes-remain' => 'The tag “$[tag]” will be deleted from posts, but the posts will remain.',
  'gs--see-also' => 'See also',
  'gs--tags-important' => 'important',
  'gs--tags-all' => 'all',
  'gs--tags' => 'Tags',
  
  // most commented and favourites
  'pt--most-commented' => 'Most commented$[period.periodname]',
  'pt--most-read' => 'Popular$[period.periodname]',
  'nm--most-read' => 'Popular',
  'pt--favourites' => 'Selected',
  'nm--favourites' => 'Selected',
  'gs--no-favourites' => 'There are no selected posts.',
  'nm--read-next' => 'Next',
  
  // generic posts pages
  'nm--pages' => 'Pages',
  'gs--page' => 'page',
  'gs--next-page' => 'next',
  'gs--prev-page' => 'previous',
  'gs--earlier' => 'Earlier',
  'gs--later' => 'Later',
  'pt--n-posts' => '$[number.cardinal]',
  'pt--no-posts' => 'No posts',
  
  // search
  'pt--search' => 'Search',
  'pt--search-query-empty' => 'Search text is empty',
  'pt--search-query-too-short' => 'Search text is too short',
  'gs--found-for-query' => 'found for',
  'gs--search-query-empty' => 'Search text is empty, please enter something.',
  'gs--search-query-too-short' => 'Text too short, enter at least 4 characters.',
  'gs--search-too-few-notes' => 'Search will work when more notes are published.',
  'gs--nothing-found' => 'Nothing found.',
  'gs--many-posts' => 'Many posts',
  'pt--search-results' => 'Search results',
  
  // password, sessions, settings
  'pt--password' => 'Password',
  'pt--password-for-blog' => 'Password for the blog',
  'ff--old-password' => 'Old password',
  'ff--new-password' => 'New password',
  'fb--change' => 'Change',
  'gs--password-changed' => 'Password has been changed',
  'er--could-not-change-password' => 'Could not change password',
  'er--no-password-entered' => 'You have not entered a password',
  'er--wrong-password' => 'Wrong password',
  'ff--displayed-as-plain-text' => 'displayed in plain text',
  'er--settings-not-saved' => 'Settings not saved',
  'pt--password-reset' => 'Password reset',
  'gs--password-reset-link-sent-maybe' => 'If the address was correct, the link to reset your password has been sent by email',
  'gs--password-reset-link-saved' => 'The link to reset your password has been saved to /user/password-reset.psa in your blog’s server folder.',
  'er--cannot-reset-password' => 'Cannot reset password: no email specified in Settings. Contact administrator.',
  'er--cannot-send-link-email-empty' => 'Cannot send password reset link: no email specified',
  'gs--i-forgot' => 'I forgot',
  'em--password-reset-subject' => 'Reset Aegea password',
  'em--follow-this-link' => 'Follow this link to reset your password:',
  
  'pt--sessions' => 'Open sessions',
  'gs--sessions-description' => 'When you sign in using your password on multiple devices or with multiple browsers, this page shows a list of all such sessions. If any of them seem suspicious, end all sessions but this, then change your password.',
  'gs--sessions-browser-or-device' => 'Browser or device',
  'gs--sessions-when' => 'When',
  'gs--sessions-from-where' => 'From where',
  'gs--locally' => 'locally',
  'gs--unknown' => 'unknown',
  'fb--end-all-sessions-but-this' => 'End all sessions but this',
  'gs--ua-iphone' => 'iPhone',
  'gs--ua-ipad' => 'iPad',
  'gs--ua-opera' => 'Opera',
  'gs--ua-firefox' => 'Firefox',
  'gs--ua-chrome' => 'Chrome',
  'gs--ua-safari' => 'Safari',
  'gs--ua-unknown' => 'Unknown',
  'gs--ua-for-mac' => 'for Mac',

  'pt--settings' => 'Preferences',
  'ff--language' => 'Language',
  'ff--theme' => 'Theme',
  'ff--theme-how-to' => 'How to create a theme?',
  'gs--theme-preview' => 'Preview',
  'ff--posts' => 'Posts',
  'ff--respond-to-dark-mode' => 'Support Dark Mode',
  'ff--items-per-page-after' => 'per page',
  'ff--show-view-counts' => 'Show view counts',
  'ff--show-sharing-buttons' => 'Show social sharing buttons',
  'ff--comments' => 'Comments',
  'ff--comments-enable-by-default' => 'Allow by default in new posts',
  'ff--comments-require-social-id' => 'Require identification with a social network',
  'ff--only-for-recent-posts' => 'Only for recent posts',
  'ff--send-by-email' => 'Send by email',
  'ff--yandex-metrika' => 'Yandex.Metrika',
  'ff--google-analytics' => 'Google Analytics',
  'gs--password' => 'Password',
  'gs--db-connection' => 'Database connection',
  'gs--get-backup' => 'Get latest backup',
  'gs--not-paid' => 'Aegea not paid for',
  'gs--paid-until' => 'Aegea is paid until',
  'gs--paid-period-ended' => 'Paid period ended',
  'bt--learn-about-payment' => 'Learn about payment',
  'gs--used' => 'Used $[used] out of $[total] MB ($[percent]%)',
  'gs--used-all' => 'All space is used: $[total] MB',
  
  'ff--blog-title' => 'Blog title',
  'ff--subtitle' => 'Subtitle',
  'gs--remove-userpic' => 'Remove photo',
  'ff--blog-description' => 'Blog description',
  'gs--search-engines-social-networks-aggregators' => 'For search engines, social networks, and aggregators',
  'ff--blog-author-picture-and-name' => 'Author’s picture and name',

  'pt--database' => 'Database',
  'ff--db-host' => 'Server',
  'ff--db-username-and-password' => 'User name and password',
  'ff--db-name' => 'Database name',
  'fb--connect-to-this-db' => 'Connect using these parameters',
  'er--cannot-save-data' => 'Couldn’t save data',
  'gs--drag-userpic-here' => 'Drag your photo here',

  // welcome
  'pt--welcome' => 'Created!',
  'pt--welcome-text-pre' => 'Your blog has been created. ',
  'pt--welcome-text-href-write' => 'Write a post',
  'pt--welcome-text-or' => ' or ',
  'pt--welcome-text-href-settings' => 'set the things up',
  'pt--welcome-text-post' => '.',

  // need for password
  'gs--need-password' => 'Your password',
  'ff--public-computer' => 'Public computer',
  'gs--frontpage' => 'Home',
  
  // form buttons
  'fb--submit' => 'Submit',
  'fb--save-changes' => 'Save changes',
  'fb--save-and-preview' => 'Save and preview',
  'fb--publish' => 'Publish',
  'fb--publish-note' => 'Publish the post',
  'fb--publish-note-at-this-time' => 'Publish the post at this time',
  'fb--select' => 'Select',
  'fb--apply' => 'Apply',
  'fb--delete' => 'Delete',
  'fb--sign-in' => 'Sign in',
  'fb--sign-out' => 'Sign out',
  'fb--send-link-by-email' => 'Send the link to this address',
  
  // time
  'pt--default-timezone' => 'Default timezone',
  'gs--e2-stores-each-posts-timezone' => 'Aegea stores timezone of each post separately.',
  'gs--e2-autodetects-timezone' => 'When publishing a post, the timezone will usually be detected automatically. In case of failure the timezone selected here will be used.',

  'tt--from-the-future' => 'From the future',
  'tt--now' => 'now',
  'tt--just-now' => 'Just now',
  'tt--one-minute-ago' => 'A minute ago',
  'tt--minutes-ago' => '$[minutes.cardinal] ago',
  'tt--one-hour-ago' => 'An hour ago',
  'tt--hours-ago' => '$[hours.cardinal] ago',
  'tt--today' => 'Today',
  'tt--today-at' => 'Today at $[time]',

  'tt--seconds-short' => '$[value.cardinal]',
  'tt--minutes-short' => '$[value.cardinal]',
  'tt--hours-short' => '$[value.cardinal]',
  'tt--days-short' => '$[value.cardinal]',
  'tt--months-short' => '$[value.cardinal]',
  'tt--years-short' => '$[value.cardinal]',

  'tt--date' => '$[month.monthname.short] $[day]',
  'tt--date-and-time' => '$[month.monthname.short] $[day], $[time]',
  'tt--date-year-and-time' => '$[month.monthname.short] $[day], $[year], $[time]',

  'tt--zone-pt' => 'Pacific Time',
  'tt--zone-mt' => 'Mountain Time',
  'tt--zone-ct' => 'Central Time',
  'tt--zone-et' => 'East Coast Time',
  'tt--zone-gmt' => 'Greenwich Mean Time',
  'tt--zone-cet' => 'Central European Time',
  'tt--zone-eet' => 'East European Time',
  'tt--zone-msk' => 'Moscow Time',
  'tt--zone-ekt' => 'Chelyabinsk Time',
  'gs--timezone-offset-hours' => 'h',
  'gs--timezone-offset-minutes' => 'min',

  // mail
  'em--comment-new-to-author-subject' => '$[commenter] comments $[note-title]',
  'em--comment-new-to-public-subject' => '$[commenter] comments $[note-title]',
  'em--comment-reply-to-public-subject' => '$[blog-author] replies to comment',
  'em--comment-reply' => '$[note-title] ($[blog-author] replies)',
  'em--created-automatically' => 'This mail was created automatically',
  'em--unsubscribe' => 'Unsubscribe from this discussion',
  'em--reply' => 'Reply',
  'em--comment-replied-at' => 'Comment replied at',

  // rss
  'gs--posts-tagged' => 'posts tagged',
  
  'gs--subscribe-to-blog' => 'Subscribe to this blog',

  // social networks
  'sn--twitter-verb' => 'Tweet',
  'sn--facebook-verb' => 'Share',
  'sn--linkedin-verb' => 'Share',
  'sn--vkontakte-verb' => 'Share',
  'sn--telegram-verb' => 'Send',
  'sn--whatsapp-verb' => 'Send',
  'sn--pinterest-verb' => 'Pin',

  // umacros
  'um--month' => '$[month.monthname]',
  'um--month-short' => '$[month.monthname.short]',
  'um--month-g' => '$[month.monthname]',
  
  // more strings
  'gs--subscribe' => 'Subscribe to this blog',
  
  'gs--no-such-notes' => 'There are no posts.',
  'pt--page-not-found' => 'Page not found',
  'gs--page-not-found' => 'Page not found.',
  
  'er--cannot-find-db' => 'Cannot find database',
  'er--cannot-connect-to-db' => 'Cannot connect to database',
  'er--mysql-version-too-old' => 'MySQL version too old ($[v1], $[v2]+ needed)',
  'er--error-occurred' => 'Error occurred',
  'er--too-many-errors' => 'Too many errors',
  'gs--rss' => 'RSS',
  
  'gs--updated-successfully' => 'Updated successfully from version $[from] to version $[to]',
  'gs--pgt' => 'Generation time',
  'gs--seconds-contraction' => 's',
  'gs--good-blogs' => 'Good blogs and sites',

  'gs--range-separator' => '–',
  
  'ab--menu-actions' => 'Actions',

  );

}



function e2lstr_monthname ($number, $modifier) {
  if ($modifier == 'short') {
    $tmp = array (
      'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan'
    );
  } else {
    $tmp = array (
      'December', 'January', 'February', 'March', 'April', 'May', 'June',
      'July', 'August', 'September', 'October', 'November', 'December', 'January'
    );
  }
  return $tmp[(int) $number];
}


function e2lstr_periodname ($period) {
  /**/if ('year' == $period) return ' last year';
  elseif ('month' == $period) return ' last month';
  elseif ('week' == $period) return ' last week';
  elseif ('day' == $period) return ' last day';
  else return '';
}


function e2lstr_ordinal ($number) {
  if ($number % 10 == 1 and $number % 100 != 11) return $number. 'st';
  if ($number % 10 == 2 and $number % 100 != 12) return $number. 'nd';
  if ($number % 10 == 3 and $number % 100 != 13) return $number. 'rd';
  return $number. 'th';
}



function e2lstr_cardinal ($number, $modifier, $string_id) {
  $s = ($number > 1);

  $result = $number;
  if ($string_id == 'pt--n-posts') $result = $number .' post'. ($s?'s':'');
  if ($string_id == 'tt--minutes-ago') $result = $number .' minute'. ($s?'s':'');
  if ($string_id == 'tt--hours-ago') $result = $number .' hour'. ($s?'s':'');
  if ($string_id == 'gs--n-comments') $result = $number .' comment'. ($s?'s':'');
  if ($string_id == 'gs--comments-n-new') $result = $number .' new';

  if ($string_id == 'tt--seconds-short') $result = $number .' s';
  if ($string_id == 'tt--minutes-short') $result = $number .' min';
  if ($string_id == 'tt--hours-short') $result = $number .' h';
  if ($string_id == 'tt--days-short') $result = $number .' d';
  if ($string_id == 'tt--months-short') $result = $number .' mo';
  if ($string_id == 'tt--years-short') $result = $number .' y';

  return $result;
  
}



?>