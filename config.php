<?php
/*
 * First authored by Brian Cray
 * Rewritten for PHP 7 by Warren Myers Mar 2019
 * Contact updater at https://warrenmyers.com
 * License: http://creativecommons.org/licenses/by/3.0/
 * Contact the author at http://briancray.com/
 */

// db options
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_HOST', '');
define('DB_TABLE', '');

// connect to database
$dbconn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//mysql_select_db(DB_NAME);

// base location of script (include trailing slash)
define('BASE_HREF', 'https://' . $_SERVER['HTTP_HOST'] . '/');

// change to limit short url creation to a single IP
define('LIMIT_TO_IP', $_SERVER['REMOTE_ADDR']);

// change to TRUE to start tracking referrals
define('TRACK', TRUE);

// check if URL exists first
define('CHECK_URL', TRUE);

// do you want to cache?
define('CACHE', TRUE);

// if so, where will the cache files be stored? (include trailing slash)
define('CACHE_DIR', dirname(__FILE__) . '/cache/');
