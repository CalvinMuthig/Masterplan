<?php
//Sicherheitsabfrage
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['usernamelogintrue'])) {
  if (isset($_GET['show']) and $_GET['show'] != "") {
    $username = $_SESSION['usernamelogintrue'];
    $id = $_GET['show'];
    include('backend/db-con.php');
    $sql = "SELECT * FROM posts WHERE creator = '$username' AND id = '$id'";

    foreach ($db->query($sql) as $row) {
  ?>
  <div class="preview container">
    <div class="row">
      <?php if (date('Y-m-d', strtotime($row['endTime'])) < date('Y-m-d') and $row['done'] == 0) {?>
        <div class="alert alert-danger" role="alert"><p>Diese Aufgabe ist überfällig. Jetzt aber schnell!</p></div>
      <?php }
      if ($row['pre'] == 1) { ?>
        <div class="alert alert-warning" role="alert"><p>Du musst die Aufgabe <b><?php echo $row['preName']; ?></b> erledigen bevor du diese Aufgabe erledigen kannst.</p></div>
       <?php } ?>
      <h2 style="margin-top: 0; padding-top: 0;" class="col-xs-11"><?php echo $row['title']; ?></h2><p class=" col-xs-1 text-right"><span class="glyphicon glyphicon-remove" aria-hidden="true" onclick="window.location = './';"></span></p>
      <em class="col-xs-12">Erstellt am <?php echo date('d.m.Y', strtotime($row['startTime'])); ?>. | Zeit bis <?php echo date('d.m.Y', strtotime($row['endTime'])); ?>.</em>
      <p class="lead col-xs-12"><b>Beschreibung: </b><?php echo $row['description']; ?></p>
      <div class="col-xs-12">
        <?php if ($row['pre'] == 0 and $row['done'] == 0) { ?>
        <button type="button" id="done" class="btn btn-success" data-id="<?php echo $row['id']; ?>" data-title="<?php echo $row['title']; ?>">Erledigt</button>
        <input type="text" id="username-input" placeholder="Nutzer">
        <button type="button" id="share" class="btn btn-info" data-id="<?php echo $row['id']; ?>">Teilen</button>
        <?php } ?>
        <button type="button" id="delete" class="btn btn-danger" data-id="<?php echo $row['id']; ?>" data-title="<?php echo $row['title']; ?>">Löschen</button>
      </div>
    </div>
  </div>
  <script src="scripts/show-functions.js"></script>
  <script src="scripts/share.js"></script>

  <?php
    }
  } else {
    header("Location: /");
  }
} else {
  echo "Du musst dich erst anmelden. <a href='/masterplan/?m=login'>Hier</a>";
}

   ?>
