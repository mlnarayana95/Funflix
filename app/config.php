<?php

	/**
	 * Config Page
	 * @last_update: 2019-09-13
	 * @author: Narayana Madabhushi, mlnarayana95@gmail.com
	 */

// Load the composer autoloader 
require __DIR__ . '/../vendor/autoload.php';

// Session is started
session_start();


use \App\Models\DatabaseLogger;

// generate a csrf token if we need one
if(empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = md5( uniqid() . time() );
}

// test every POST submission for the csrf token
if('POST' == $_SERVER['REQUEST_METHOD']) {
    if(empty($_POST['csrf']) || $_POST['csrf'] != $_SESSION['csrf']) {
        die('Your session appears to have expired.  CSRF token mismatch!');
    }
}

//Output buffering enabled 
ob_start();

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

define('DB_DSN', 'mysql:host=localhost;dbname=funflix_video_db');
define('DB_USER', 'root');
define('DB_PASS', '');


// 1. Create a connection 
$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
// set the $dbh to display errors if there are any 
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

DatabaseLogger::init($dbh);

$logger = new DatabaseLogger();
		// Create an event
$event = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']) . ' | ' .
            	$_SERVER['REQUEST_METHOD'] . ' | ' . $_SERVER['REQUEST_URI'] . ' | '
            	. $_SERVER['HTTP_USER_AGENT'];

$logger->write($event);
	

require 'functions.php';

