<?php if(empty($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) : ?>
   <?php require '../inc/header.inc.php'; ?>
  <?php else : ?>
    <?php require '../inc/navheader.inc.php'; ?>
  <?php endif; ?>
    <?php require '../inc/flash.inc.php'; ?>
  