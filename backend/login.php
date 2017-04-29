<?php
/*
Pfad: /backend/login.php

Beschreibung: Dieser Code wird für die Anmeldung im Dashboard verwendet.
*/

//Sind die Eigabefelder übertragen worden? (aus Datei: /pages/login.php)
if (isset($_POST['username']) and isset($_POST['password'])) {
  //Wenn ja -> Variablen deklarieren
  $username = $_POST['username'];
  $password = $_POST['password'];

  //Datenbank nach Nutzername + Passwort == eigaben durchsuchen
  $i = 0;
  include('db-con.php'); //-> Datenbank Verbindung importieren
  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  foreach ($db->query($sql) as $row) {
     $i++;
  }
  if ($i === 1) { //-> Es wurde ein Eintrag bzw. Nutzer gefunden.
    echo "login";
    session_start();
    $_SESSION['usernamelogintrue'] = $username; //Session wird gesetzt. (login=TRUE)
  } else {
    echo "Nutzername und Passwort stimmen nicht überein.";
  }
} else {
  echo "Fehler"; // -> Eingabefelder sind nicht gesendet worden.
}

 ?>
