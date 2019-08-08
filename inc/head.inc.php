<?php

/**
 * Head Include Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/apple-touch-icon.png"/>
  <link rel="apple-touch-icon" sizes="57x57" href="images/android-chrome-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="images/android-chrome-72x72.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png" />
  <link rel="stylesheet" href="styles/desktop.css" />
  <link rel="stylesheet" href="styles/mobile.css" />
  
  <title><?=$title?></title>
  <?php 
      if($title == 'Funflix Canada - Watch TV Shows and Movies') {
          include 'index.inc.css';
      }elseif($title == 'Funflix Canada - Login') {
          include 'login.inc.css';
      }elseif($title == 'Funflix Canada - Sign Up') {
          include 'signup.inc.css';
      }elseif($title == 'Funflix Canada - Movies') {
          include 'movies.inc.css';
      }elseif($title == 'Funflix Canada - TV Shows') {
          include 'tvshows.inc.css';
      }elseif($title == 'Funflix Canada - My Profile') {
          include 'myprofile.inc.css';
      }elseif($title == 'Funflix Canada - Home') {
          include 'home.inc.css';
      }
  ?>
</head>
  