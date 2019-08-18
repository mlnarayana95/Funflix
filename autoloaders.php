<?php 

/**
 * Accept class name, convert to file path, require file 
 * @param  String 
 */
$autoload = function ($class){

	// Project base namespace
	$prefix = "App\\";

	// Base directory where my classes reside
	$base_dir = __DIR__ . '/classes/';

	$len = strlen($prefix);

	// Test that class name passed in is using the prefix 
	if(strncmp($prefix, $class, $len) !== 0){ 
		return;
	}
	
	// Get the class minus the intial part
	$sub_class = substr($class, $len);

	$file = $base_dir . $sub_class . '.php';

	if(file_exists($file)) {
		require $file;
	}
};


spl_autoload_register($autoload);
