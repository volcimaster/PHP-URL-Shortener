<?php
/*
 * First authored by Brian Cray
 * Rewritten for PHP 7 by Warren Myers Mar 2019
 * Contact updater at https://warrenmyers.com
 * License: http://creativecommons.org/licenses/by/3.0/
 * Contact the author at http://briancray.com/
 */
 
ini_set('display_errors', 0);

$url_to_shorten = trim($_GET['longurl']);

if(!empty($url_to_shorten) && preg_match('|^https?://|', $url_to_shorten))
{
	require('config.php');

	// check if the client IP is allowed to shorten
	if($_SERVER['REMOTE_ADDR'] != LIMIT_TO_IP)
	{
		die('You are not allowed to shorten URLs with this service.');
	}
	
	// check if the URL is valid
	if(CHECK_URL)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url_to_shorten);
		curl_setopt($ch,  CURLOPT_RETURNTRANSFER, TRUE);
		$response = curl_exec($ch);
		$response_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if($response_status == '404')
		{
			die('Not a valid URL');
		}		
	}
	
	// URL not in database, insert
	    $url_to_shorten = mysqli_real_escape_string($dbconn, $url_to_shorten);
	mysqli_query($dbconn, 'LOCK TABLES ' . DB_TABLE . ' WRITE;');
	mysqli_query($dbconn, 'INSERT INTO ' . DB_TABLE . ' (long_url, created, creator) VALUES ("' . $url_to_shorten . '", "' . time() . '", "' . mysqli_real_escape_string($dbconn, $_SERVER['REMOTE_ADDR']) . '")');
	$miid = mysqli_insert_id($dbconn);
	$shortened = base_convert($miid,10,36);
	mysqli_query($dbconn, 'UNLOCK TABLES');

	echo BASE_HREF . $shortened;
	mysqli_close($dbconn);
}

?>
