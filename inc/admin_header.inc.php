<?php

use \App\Models\Video;

Video::init($dbh);

if (isset($_POST['search'])) {
  $search_value = $_POST['search'];
  $video = new Video();
  $list = $video->searchVideo($search_value);
}
/**
 * Navigation Header Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
?>
<header style="display: inline-block;">
    <p  style="display: inline-block;float: left;">
      <a href="admin.php"><span id="logo">
        <img id="landing_logo" src="../images/logo.png" alt="logo">
      </span></a>
    </p>
    <p style="display: inline-block;
              float: right;
              margin-right: 13px;
              margin-top: 26px;">
      <a href="../login.php?logout=1" class="btn1">Sign Out</a>
    </p>
    <nav>
      <a id="menu-toggle" href="#navlist"><img src="../images/menu-white.png" alt="menu toggle" /></a> <!-- starts navigation -->
      <ul>
        <li class="navigation<?=($title=='Funflix Canada - Admin Home') ? ' current' : ''; ?>"><a href="home.php">HOME</a></li>
        <li class="navigation<?=($title=='Funflix Canada - Admin Video Collection') ? ' current' : ''; ?>"><a href="vidcollection.php">VIDEO COLLECTION</a></li>
        <li class="navigation<?=($title=='Funflix Canada - Admin Users') ? ' current' : ''; ?>"><a href="users.php">USERS</a></li>
        <li class="navigation<?=($title=='Funflix Canada - Admin Genre') ? ' current' : ''; ?>"><a href="genre.php">GENRE</a></li>
        <li class="navigation<?=($title=='Funflix Canada - Admin View List') ? ' current' : ''; ?>"><a href="viewlist.php">VIEW LIST</a></li>
      </ul>
    </nav> 
    <?php if (!isset($_GET['video_id'])): ?>
    <form method="post" class="form-inline">
            <input type="hidden" name="csrf" value="<?=csrf()?>" />
            <input class="form-control mr-sm-2" type="text" placeholder="Search with title" name="search" />
            <button class="btn1" type="submit">Search</button>
    </form>
    <?php endif ?>
</header>
