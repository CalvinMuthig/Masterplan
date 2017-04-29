<?php
/*
Pfad: /backend/newUser.php

Beschreibung: Dieser Code wird benutzt um einen neuen Nutzer zu erstellen und
dient als Aufruf die Klasse /backend/classes/users.php

*/

//Wurde das Formular bzw. der Inhalt erfolgreich gesendet.
  if (isset($_POST['name'])) {

    //Wenn ja -> Variablen deklarieren
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    //Sind die Eingabefelder alle ausgefüllt?
    if (strlen($name) != 0 and strlen($lastname) != 0 and strlen($username) != 0 and strlen($email) != 0 and strlen($password) != 0) {
      //Ja -> Datenbank Verbindung importieren
      include('db-con.php');

      //Gibt es schon einen Nutzer mit diesem Nutzernamen oder dieser Email?
      $sql = "SELECT username FROM users WHERE username = '$username' OR email = '$email'";
      $i = 0;
      foreach ($db->query($sql) as $row) {
         $i++;
      }
      if ($i === 0) {
        //Kein Nutzer mit diesem Namen/dieser Email
        if ($password === $password2) {
          //Passwort stimmt mit der Überprüfun überein.
          //Neuen Nutzer erstellen mit der Klasse User
          include('classes/users.php');
          $user = new user($name, $lastname, $username, $email, $password);
          $user->create();
          echo "?m=login"; //-> Zur Login-Seite
        } else {
          echo "Deine Passwörter stimmen nicht überein.";
        }
      } else {
        echo "Diese Email Adresse oder der Nutzername werden bereits verwendet.";
      }
    } else {
      echo "Du musst alle Felder ausfüllen.";
    }
} else {
  echo "Fehler"; //-> Formular wurde nicht gesendet.
}


 ?>
