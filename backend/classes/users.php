<?php

  /*
  Pfad: /backend/classes/users.php

  Beschreibung: Diese Klasse ist dafür da, neue Nutzer zu erstellen und dient zu Registrierung.
  Anwendung: $beispielNutzer = new user(Vorname, Nachname, Nutzername, Email, Passwort);

  Funktionen: create() = $beispiel->create(); -> Fügt Datensatz in der Datenbank ein.

  Aufruf erfolgt über die Datei(en): /backend/newUser.php
  */

  class user {

    //Eigenschaften
    public $name;
    public $lastName;
    public $username;
    public $email;
    private $password;

    //Konstrukt
    public function __construct($name, $lastName, $username, $email, $password) {
      $this->name = $name;
      $this->lastName = $lastName;
      $this->username = $username;
      $this->email = $email;
      $this->password = $password;
    }

    //Methode(n)
    //create() = $beispiel->create(); -> Fügt Datensatz in der Datenbank ein.
    public function create() {
      include('db-con.php');
      $stm = $db->prepare("INSERT INTO users (name, lastname, username, email, password) VALUES (?, ?, ?, ?, ?)");
      $stm->execute(array($this->name, $this->lastName, $this->username, $this->email, $this->password));
    }
  }

 ?>
