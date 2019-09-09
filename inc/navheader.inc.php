<?php

/**
 * Navigation Header Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */


use \App\Models\Video;

Video::init($dbh);

if (isset($_POST['search'])) {
  $search_value = $_POST['search'];
  $video = new Video();
  $list = $video->searchVideo($search_value);
}
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
        <li class="navigation<?=($title=='Funflix Canada - List') ? ' current' : ''; ?>"><a href="mylist.php">LIST</a></li>

      </ul>
    </nav>
    <?php if ($title != 'Funflix Canada - My Profile' && $title != 'Funflix Canada - List'): ?>
      
 
        <form style="    display: inline-block;
    top: 14px;
    position: absolute;
" method="post" class="form-inline">
            <input style="padding: 4px;
    border: 2px solid #000;
    border-radius: 4px;
    height: 30px;" class="form-control mr-sm-2" type="text" placeholder="Search with title" name="search" />
            <button class="btn1" type="submit">Search</button>
    </form>
   <?php endif ?>
</header>
