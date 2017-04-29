<?php
//Sicherheitsabfrage
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['usernamelogintrue'])) {

  /*
  Pfad: /backend/classes/posts.php

  Beschreibung: Diese Klasse ist dafür da, Aufgaben zu teilen.
  Anwendung: $beispiel = new share(id, user);

  Funktionen: share() = $beispiel->share();

  Aufruf erfolgt über die Datei(en): /backend/shareThis.php
  */

  class share {

    //Eigenschaften
    public $id;
    public $username;

    //Konstrukt
    public function __construct($id, $user) {
      $this->id = $id;
      $this->username = $user;
    }

    //Methode(n)
    public function share() {
        //Datenbank Verbindung
        include ('db-con.php');
        //Datensatz in Datenbank einfügen
        $stm = $db->prepare("INSERT INTO shares (id, username) VALUES (?, ?)");
        $stm->execute(array($this->id, $this->username));
        echo "ok";
    }

  }
} else {
  echo "Du musst dich erst anmelden. <a href='/masterplan/?m=login'>Hier</a>";
}

?>
