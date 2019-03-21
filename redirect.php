<?php
/*
 * First authored by Brian Cray
 * Rewritten for PHP 7 by Warren Myers Mar 2019
 * Contact updater at https://warrenmyers.com
 * License: http://creativecommons.org/licenses/by/3.0/
 * Contact the author at http://briancray.com/
 */

ini_set('display_errors', 1);

if(!preg_match('|^[0-9a-zA-Z]{1,32}$|', $_GET['url']))
{
	die('That is not a valid short url');
}

require('config.php');

$shortened_id = $_GET['url'];
$results = mysqli_query($dbconn, "SELECT long_url FROM " . DB_TABLE . " WHERE short='$shortened_id'");
$long_url = mysqli_fetch_assoc($results)['long_url'];
mysqli_close($dbconn);

header("HTTP/1.1 301 Moved Permanently");
header("Location: " .  $long_url);

?>
