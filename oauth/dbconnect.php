<?php
error_reporting(0);
require 'dbconfig.php';

#session vars
ob_start();
session_start();
$http_referer = $_SERVER['HTTP_REFERER'];

/***** COMMENTED OUT TEMPORARILY ******
#security
$_SESSION['callback_URL'] = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . 
	$_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];
*/
//connect to db
$db = new mysqli("$dbhost", "$dbuser", "$dbpass", "$dbname");
if($db->connect_errno){
	die('Sorry, we are having some connectivity problems.');
}
function loggedin(){
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		return true;
	} else {
		return false;
	}
}
?>