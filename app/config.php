<?php

/**
 * Config Page
 * @last_update: 2019-08-03
 * @author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

define('DB_DSN', 'mysql:host=localhost;dbname=course');
define('DB_USER', 'web_user');
define('DB_PASS', 'mypass');


// 1. Create a connection 
$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
// set the $dbh to display errors if there are any 
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);