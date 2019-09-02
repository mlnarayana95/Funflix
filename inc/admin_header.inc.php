<?php

/**
 * Navigation Header Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
?>
<header style="display: inline-block;">
    <p  style="display: inline-block;float: left;">
      <span id="logo">
        <img id="landing_logo" src="../images/logo.png" alt="logo">
      </span>
    </p>
    <p style="display: inline-block;
              float: right;
              margin-right: 13px;
              margin-top: 26px;">
      <a href="login.php?logout=1" class="btn1">Sign Out</a>
    </p>
    <nav>
      <a id="menu-toggle" href="#navlist"><img src="../images/menu-white.png" alt="menu toggle" /></a> <!-- starts navigation -->
      <ul>
        <li class="navigation<?=($title=='Funflix Canada - Admin Home') ? ' current' : ''; ?>"><a href="home.php">HOME</a></li>
        <li class="navigation<?=($title=='Funflix Canada - Admin Users') ? ' current' : ''; ?>"><a href="tvshows.php">USERS</a></li>
        <li class="navigation<?=($title=='Funflix Canada - Admin Orders') ? ' current' : ''; ?>"><a href="movies.php">ORDERS</a></li>
        <li class="navigation<?=($title=='Funflix Canada - Admin Genre') ? ' current' : ''; ?>"><a href="my_profile.php">GENRE</a></li>
      </ul>
    </nav> 
</header>
