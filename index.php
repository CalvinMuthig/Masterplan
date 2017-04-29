<?php
session_start();
if (isset($_SESSION['usernamelogintrue'])) {
  if  (isset($_GET['m'])) {
    if ($_GET['m'] === "logout") {
      include('module/logout.php');
    } else if ($_GET['m'] === "add") {
      include('pages/dashboard.php');
      include('module/create.php');
    } else {
      include('pages/dashboard.php');
    }
  } else {
    if (isset($_GET['show']) and $_GET['show'] != "" and !isset($_GET['done'])) {
      include('pages/dashboard.php');
      include('module/show.php');
    }
    else if (isset($_GET['done']) and isset($_GET['show'])) {
      include('module/show-done.php');
      include('module/show.php');
    }
    else if (isset($_GET['done'])) {
      include('module/show-done.php');
    }
    else if (isset($_GET['share']) and $_GET['share'] != "") {
      include('pages/dashboard.php');
      include('module/show-share.php');
    } else {
      include('pages/dashboard.php');
    }
  }
} else {
  if  (isset($_GET['m'])) {
    if ($_GET['m'] === "login") {
      include('pages/login.php');
    } else if ($_GET['m'] === "registrieren") {
      include('pages/register.php');
    } else {
      include('pages/home.php');
    }

  } else {
    include('pages/home.php');
  }
}
 ?>
