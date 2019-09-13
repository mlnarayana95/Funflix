<?php


/**
 * Functions Page
 * @last_update: 2019-09-13
 * @author: Narayana Madabhushi, mlnarayana95@gmail.com
 */


//functions 

/**
 * Logs out user and redirects to the login page
 * @return [type] [description]
 */
function logout()
{
   	session_regenerate_id();
    unset($_SESSION['logged_in']);
    $_SESSION['flash'] = 'You have been successfully logged out';
    header("Location: login.php");
    die;
}
/**
 * Dump and die
 * @param  Mixed $var 
 * @return Void
 */
function dd($var)
{
	var_dump($var);
}

/**
 * Escape string for output to HTML
 * @param  String $string 
 * @return String
 * */
function esc($string)
{
	return htmlentities($string, null, "UTF-8");
}

/**
 * [esc_attr description]
 * @param  String $string 
 * @return String
 */
function esc_attr($string)
{
	return htmlentities($string, ENT_QUOTES, "UTF-8");
}

/**
 * Return Sanitized POST values
 * @param  String $field 
 * @return String the sanitized string
 *  */
function clean($field){
	if(!empty($_POST[$field])){
		return esc_attr($_POST[$field]); 
	}
	else{
		return '';
	}
}
	
/**
 * [label description]
 * @param  [type] $string [description]
 * @return [type]         [description]
 */
function label($string) 
{	
	return ucwords(str_replace('_',' ',$string) );
}

/**
 * Returns Session's csrf token set
 * @return [type] [description]
 */
function csrf()
{
    return $_SESSION['csrf'];
}