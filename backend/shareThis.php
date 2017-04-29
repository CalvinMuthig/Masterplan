<?php
//Sicherheitsabfrage
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['usernamelogintrue'])) {
  if (isset($_POST['id']) and isset($_POST['username']) and $_POST['id'] != "" and $_POST['username'] != "") {
    include ('db-con.php');
    $username = $_POST['username'];
    $sql = "SELECT username FROM users WHERE username = '$username'";
    $i = 0;
    foreach ($db->query($sql) as $row) {
       $i++;
    }
    if ($i == 0) {
      echo "Dieser Nutzer exsistiert nicht.";
    } else {
      include('classes/shares.php');

      $username = $_POST['username'];
      $id = $_POST['id'];

      $share = new share($id, $username);
      $share->share();
    }
  } else {
    echo "Du musst einen Namen angeben!";
  }
} else {
  echo "Du musst dich erst anmelden. <a href='/masterplan/?m=login'>Hier</a>";
}
 ?>
