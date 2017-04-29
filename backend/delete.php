<?php
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['usernamelogintrue'])) {
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $username = $_SESSION['usernamelogintrue'];
    include("db-con.php");
    $stm = $db->prepare("DELETE FROM posts WHERE creator = '$username' AND id = '$id'");
    $stm->execute();
    echo "ok";
  } else {
    echo "Fehler im System";
  }
} else {
  echo "Du musst dich erst anmelden. <a href='/masterplan/?m=login'>Hier</a>";
}
 ?>
