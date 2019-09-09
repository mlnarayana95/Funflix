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
  <link rel="icon" sizes="57x57" href="images/android-chrome-57x57.png" />
  <link rel="icon" sizes="72x72" href="images/android-chrome-72x72.png" />
  <link rel="icon" sizes="114x114" href="images/apple-icon-114x114.png" />
  <link rel="icon" sizes="144x144" href="images/apple-icon-144x144.png" />
  <link rel="stylesheet" href="css/desktop.css" />
  <link rel="stylesheet" href="css/mobile.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script
  src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
  integrity="sha256-HmfY28yh9v2U4HfIXC+0D6HCdWyZI42qjaiCFEJgpo0="
  crossorigin="anonymous"></script>

  <script src="js/slick/slick.min.js"></script>
  <link rel="stylesheet" type="text/css" href="js/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="js/slick/slick-theme.css"/>

  <title><?=$title?></title>
  <script>
  $(document).ready(function(){
  $('.autoplay').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 700,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
  });
  </script>

  <?php

      if($title == 'Funflix Canada - Watch TV Shows and Movies') {
          include '../inc/index.inc.css';
      }elseif($title == 'Funflix Canada - Login') {
          include '../inc/login.inc.css';
      }elseif($title == 'Funflix Canada - Sign Up') {
          include '../inc/signup.inc.css';
      }elseif($title == 'Funflix Canada - Movies') {
          include '../inc/movies.inc.css';
      }elseif($title == 'Funflix Canada - TV Shows') {
          include '../inc/tvshows.inc.css';
      }elseif($title == 'Funflix Canada - My Profile') {
          include '../inc/myprofile.inc.css';
      }elseif($title == 'Funflix Canada - Home') {
          include '../inc/home.inc.css';
      }elseif($title == 'User Information') {
        include '../inc/show_user.inc.css';
      }elseif($title == 'Funflix Canada - My List'){
        include '../inc/mylist.inc.css';
      }
  ?>
</head>
  