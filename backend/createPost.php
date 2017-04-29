<?php
/*
Pfad: /backend/createPost.php

Beschreibung: Dieser Code wird benutzt um eine Neue Aufgabe zu erstellen.

*/
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
//Ist der Nutzer angemeldet
if (isset($_SESSION['usernamelogintrue'])) {

  //Ist das Formular mit allen Daten angekomme? (aus Datei /module/create.php)
  if (isset($_POST['title']) and isset($_POST['description']) and isset($_POST['endTime'])) {
    //Wenn alles angekommen:

    //Variablen deklarieren
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $endTime = $_POST['endTime'];
    $creator = $_SESSION['usernamelogintrue'];

    //Sind die Eingabefelder (aus Datei /module/create.php) ausgefüllt?
    if (strlen($title) != 0 and strlen($desc) != 0 and strlen($endTime) != 0) {
      //Wenn alles ausgefüllt:

      //Ist eine Vorstufe für die Aufgabe notwendig?
      if (isset($_POST['pre']) and isset($_POST['preName'])) {
        //Wenn ja:
          $pre = $_POST['pre'];
          $preName = $_POST['preName'];
      } else {
        //Wenn nein:
        echo "Es wurde keine Vorstufe erstellt. <br/>";
        $preName = 0;
      }
      //Klasse Post PHP importieren
      include('classes/posts.php');

      //Neue Aufgabe/Post deklarieren
      $post = new post($title, $desc);
      $post->create($preName, $endTime, $creator);
      echo "Aufgabe erstellt."; // -> Erfolgreich
    } else {
    echo "Du musst alle Felder ausfüllen.";
    }
  } else {
    echo "Fehler im System."; //-> Das Formular wurde nicht gesendet.
  }
} else {
  echo "Du musst dich erst anmelden. <a href='/masterplan/?m=login'>Hier</a>";
}


?>
