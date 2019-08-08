<?php

/**
 * Navigation Header Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
?>
<header>
    <span id="logo">
      <img id="landing_logo" src="images/logo.png" alt="logo">
    </span>
    <nav>
      <a id="menu-toggle" href="#navlist"><img src="images/menu-white.png" alt="menu toggle" /></a> <!-- starts navigation -->
      <ul>
        <li <?=($title=='Funflix Canada - Home') ? 'class="current"' : ''; ?>><a href="home.php">HOME</a></li>
        <li <?=($title=='Funflix Canada - TV Shows') ? 'class="current"' : ''; ?>><a href="tvshows.php">TV SHOWS</a></li>
        <li <?=($title=='Funflix Canada - Movies') ? 'class="current"' : ''; ?>><a href="movies.php">MOVIES</a></li>
        <li <?=($title=='Funflix Canada - My Profile') ? 'class="current"' : ''; ?>><a href="my_profile.php">MY PROFILE</a></li>
      </ul>
      </nav> 
      <div id="header_button">
        <a href="login.php" class="btn1">Sign Out</a>
      </div>
</header>
