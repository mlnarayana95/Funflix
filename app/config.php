<?php

/**
 * Config Page
 * @last_update: 2019-08-27
 * @author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
// Load the composer autoloader 
require __DIR__ . '/../vendor/autoload.php';

// Session is started
session_start();
//Output buffering enabled 
ob_start();

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

define('DB_DSN', 'mysql:host=localhost;dbname=funflix_video_db');
define('DB_USER', 'mlnarayana95');
define('DB_PASS', 'mypass');


// 1. Create a connection 
$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
// set the $dbh to display errors if there are any 
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require 'functions.php';

