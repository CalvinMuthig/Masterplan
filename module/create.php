<?php
//Sicherheitsabfrage
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['usernamelogintrue'])) {
  if (isset($_GET['m']) and $_GET['m'] == "add") {
    $username = $_SESSION['usernamelogintrue'];
  ?>
  <div class="preview container">
    <div class="row">
      <h2 style="margin-top: 0; padding-top: 0;" class="col-xs-11">Neue Aufgabe erstellen</h2><p class=" col-xs-1 text-right"><span class="glyphicon glyphicon-remove" aria-hidden="true" onclick="window.location = './';"></span></p>
      <form ng-app method="post" action="./">
        <input type="text" placeholder="Titel" name="title" class="form-control">
        <textarea type="text" placeholder="Beschreibung" name="description" class="form-control" ></textarea>
        <input type="date" placeholder="Ende (Datum)" name="endTime" class="form-control">
        Vorstufe? <input type="checkbox" name="pre" ng-model="pre">

        <!-- Auswahl der Vorstufe -->
        <select placeholder="Vorstufe (Titel)" name="preName" class="form-control" ng-show="pre">
          <?php
          $username = $_SESSION['usernamelogintrue'];
          include('backend/db-con.php');
          $sql = "SELECT * FROM posts WHERE creator = '$username' ORDER BY pre,endTime ASC";
          foreach ($db->query($sql) as $row) {
            echo "<option>".$row['title']."</option>";
          }
          ?>
        </select>
        <!-- ###### --->
        <button type="submit" class="btn btn-primary create-btn" name="create">Hinzufügen</button>
      </form>
      <div id="create-info"></div>
    </div>
  </div>
  <script src="scripts/createPost.js"></script>
  <?php
  }
} else {
  echo "Du musst dich erst anmelden. <a href='/masterplan/?m=login'>Hier</a>";
}
   ?>
