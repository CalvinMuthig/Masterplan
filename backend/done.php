<?php
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['usernamelogintrue'])) {
  if (isset($_POST['id']) and isset($_POST['title'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $username = $_SESSION['usernamelogintrue'];
    include("db-con.php");

    $sql = "SELECT * FROM posts WHERE creator = '$username' AND preName = '$title' AND pre = 1";
    foreach ($db->query($sql) as $row) {
      $preID = $row['id'];
      $stm1 = $db->prepare("UPDATE posts SET pre = 0 WHERE id = '$preID'");
      $stm1->execute();
    }
    $stm = $db->prepare("UPDATE posts SET done = 1 WHERE creator = '$username' AND id = '$id'");
    $stm->execute();
    echo "ok";
  } else {
    echo "Fehler im System";
  }
} else {
  echo "Du musst dich erst anmelden. <a href='/masterplan/?m=login'>Hier</a>";
}
 ?>
