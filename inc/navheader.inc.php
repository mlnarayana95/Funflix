<?php

/**
 * Navigation Header Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
?>
<header>
    <p  style="display: inline-block;float: left;">
      <span id="logo">
        <img id="landing_logo" src="images/logo.png" alt="logo">
      </span>
    </p>
    <p style="display: inline-block;
              float: right;
              margin-right: 13px;
              margin-top: 26px;">
    <a href="login.php?logout=1" class="btn1">Sign Out</a>
    </p>
    <nav style="display: inline-block;">
      <a id="menu-toggle" href="#navlist"><img src="images/menu-white.png" alt="menu toggle" /></a> <!-- starts navigation -->
      <ul>
        <li class="navigation<?=($title=='Funflix Canada - Home') ? ' current' : ''; ?>"><a href="home.php">HOME</a></li>
        <li class="navigation<?=($title=='Funflix Canada - TV Shows') ? ' current' : ''; ?>"><a href="tvshows.php">TV SHOWS</a></li>
        <li class="navigation<?=($title=='Funflix Canada - Movies') ? ' current' : ''; ?>"><a href="movies.php">MOVIES</a></li>
        <li class="navigation<?=($title=='Funflix Canada - My Profile') ? ' current' : ''; ?>"><a href="my_profile.php">MY PROFILE</a></li>
      </ul>
    </nav> 
</header>
