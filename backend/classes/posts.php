<?php
//Sicherheitsabfrage
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['usernamelogintrue'])) {

  /*
  Pfad: /backend/classes/posts.php

  Beschreibung: Diese Klasse ist dafür da, neue Aufgaben zu erstellen.
  Anwendung: $beispiel = new post(Titel, Beschreibung);

  Funktionen: create() = $beispiel->create(ggf. Voraussetzung Titel, Ende Datum,
  Ersteller);

  Aufruf erfolgt über die Datei(en): /backend/createPost.php
  */

  class post {

    //Eigenschaften
    public $title;
    public $description;
    public $startTime;
    public $endTime;
    public $creator;
    public $shares;
    public $pre;
    public $preName;
    public $done;

    //Konstrukt
    public function __construct($title, $desc) {
      $this->title = $title;
      $this->description = $desc;
      $this->startTime = date('Y-m-d', time());
    }

    //Methode(n)
    public function create($preName, $endTime, $creator) {
        //Datenbank Verbindung
        include ('db-con.php');

        //Eigenschaften bestimmen
        $this->creator = $creator;

        //Gibt es eine Voraussetzung?
        if ($preName === 0) {
          $this->pre = false;
          $this->preName = "";
        } else {
          $this->pre = true;
          $this->preName = $preName;
        }

        //Bei Erstellung nicht erledigt :)
        $this->done = false;

        //Ende Datum
        $this->endTime = date('Y-m-d', strtotime($endTime));

        //Datensatz in Datenbank einfügen
        $stm = $db->prepare("INSERT INTO posts (title, description, startTime, endTime, creator, pre, preName, done) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stm->execute(array($this->title, $this->description, $this->startTime, $this->endTime, $this->creator, $this->pre, $this->preName, $this->done));
    }

  }
} else {
  echo "Du musst dich erst anmelden. <a href='/masterplan/?m=login'>Hier</a>";
}

?>
