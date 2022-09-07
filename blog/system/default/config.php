<?php 


// after changing some of these params it may be necessary
// to empty the caches at .../system/underhood/


// UI

// years range separator for the copyright line, if different from default
$_config['years_range_separator'] = ''; /* html */

// period for the most commented (hot) posts
$_config['hot_period'] = 'month'; /* 'day', 'week', 'month', 'year', 'ever' */

// period for the most read (popular) posts
$_config['popular_period'] = 'ever'; /* 'day', 'week', 'month', 'year', 'ever' */

// default text formatter (make sure you know why you change it)
$_config['default_formatter'] = 'neasden'; /* 'raw', 'calliope', 'neasden' */



// THEMES

// show raw template data instead of using actual templates
$_config['raw_template_data'] = false;
  
// show raw template date with ?raw parameter
$_config['raw_template_data_with_param'] = false;

// default maximum image width
$_config['max_image_width'] = 2560; /* pixels */



// URLS

// redirect to canonical urls when synonims are used
$_config['force_canonical_urls'] = true;
  
// redirect to this domain name (will work only if force_canonical_urls is on)
$_config['preferred_domain_name'] = null; /* null or string */
  
// use beautiful (synthetic) or ?parametrised (real) urls
$_config['url_composition'] = 'auto'; /* 'auto', 'real', 'synthetic' */

// add “all/” in front of urls in case of 404
$_config['try_redirect_to_all'] = false;
  


// MISC

// sender address for outgoing mail (if ends with @, domain name will be added)
$_config['mail_from'] = 'blog@';
  
// use 'index, follow' everywhere (otherwise will be only where necessary)
$_config['index_follow_everything'] = true;
  
// accept holborn notifications
$_config['holborn'] = false;
  
// count reads
$_config['count_reads'] = true;
  
// access rights to use for uploaded files
$_config['uploaded_files_mode'] = 0777;

// maximum size of all uploaded files in bytes (0 for no limit)
$_config['files_total_size_limit'] = 0;

// scale images bigger than this; 0 to disable
$_config['fit_uploaded_images'] = 2560; /* pixels */

// database table prefix for storing multiple blogs in one database
$_config['db_table_prefix'] = 'e2Blog';

// database table subset for storing multiple blogs in one table set
$_config['db_table_subset'] = 1;

// by default, Aegea reindexes databases for search on switch
$_config['retain_search_indexes_on_db_switch'] = false;

// url to ping when posts become available
$_config['broadcast_url'] = 'http://blogengine.ru/blogs/@notify';

// broadcast all blog notes during indexing
$_config['broadcast_on_indexing'] = false;

// display as many as this number of drafts per page
$_config['drafts_per_page'] = 100; /* 0 for no limit */

// automatically generate aliases for posts 
$_config['autoreplace_for_aliases'] = [];

// url to check lincense information
$_config['license_url'] = 'http://blogengine.ru/licenses/?domain=';



// BACKUP

// make fresh backup before update?
$_config['backup_before_update'] = true;

// make fresh backup before update?
$_config['backup_automatically'] = true;

// back up each query into a tail file
$_config['backup_tail'] = true;

// how often to rebuild backup from scratch and erase tail file
$_config['backup_rebase_interval'] = SECONDS_IN_A_WEEK;



// PODCASTING

// xml to insert into RSS for itunes categories
$_config['rss_itunes_categories_xml'] = '';

// does podcast contain explicity content
$_config['rss_itunes_explicit'] = 'no'; /* 'yes' or 'no' */



// SOCIAL NETWORKS

// which networks to share to (also supported: linkedin, whatsapp)
$_config['share_to'] = 'twitter, facebook, vkontakte, telegram, pinterest';

// via whom to share to Twitter
$_config['share_to_twitter_via'] = '';



// CONSTANTS

// maximum length of a comment in bytes (bigger ones won't be accepted)
$_config['max_comment_length'] = 4096;

// for how many days are comments fresh?
$_config['comment_freshness_days'] = 14;

// number of items in RSS feeds
$_config['rss_items'] = 20;

// Rose
$_config['search_favourites_boost'] = 2;



// DEBUG AND DEVELOPMENT

// write a log to user/logs/main.log? (it may get very large soon)
$_config['write_log'] = true;

// if user/log.txt is not there, create it?
$_config['write_log_create'] = false;

// reset a log in the beginning of page generation
$_config['write_log_reset'] = false;

// keep log under this limit
$_config['write_log_limit'] = 0; /* bytes */

// create separate background search indexer log
$_config['log_bsi'] = false;

// create separate installer logs
$_config['log_installs'] = true;

// create separate update logs
$_config['log_updates'] = true;

// create separate update logs
$_config['log_broadcast'] = false;

// create separate errors logs
$_config['log_errors'] = true;

// display page generation stats?
$_config['display_stat'] = 0; /* 0 - no; 1 - when logged in; 2 - always */

// show call stack when displaying error?
$_config['show_call_stack'] = 0; /* 0 - no; 1 - when logged in; 2 - always */

// store backtrace in backtrace.psa?
$_config['store_backtrace'] = 0;
  
// make ajax slower?
$_config['dev_verbose'] = 0; /* 0 - no; 1 - when logged in; 2 - always */
  
// serve all XML content as plain text
$_config['dev_xml_as_text'] = 0;
  
// dump the CTree to a php file
$_config['dev_dump_ctree'] = 0;
  
// make ajax slower?
$_config['dev_slow_ajax'] = 0;
  
// break thing randomly?
$_config['dev_chaos'] = 0;
  
// make ajax slower?
$_config['dev_ignore_version_mismatch'] = 0;
  
// output rose debug info
$_config['dev_rose_info'] = 0;

// output fitter debug info
$_config['dev_fitter_debug_info'] = 0;

// fitter debugging parameters
$_config['fitter_debug'] = 0;
$_config['fitter_ignore_constraints'] = 0;
$_config['fitter_ignore_default_constraints'] = 0;
$_config['fitter_force_layout'] = false;
$_config['fitter_force_seed'] = false;

 

?>