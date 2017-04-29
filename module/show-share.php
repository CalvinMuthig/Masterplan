<?php
//Sicherheitsabfrage
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['usernamelogintrue'])) {
  include('backend/db-con.php');
  $username = $_SESSION['usernamelogintrue'];
  $sqlA = "SELECT * FROM shares WHERE username = '$username'";
  foreach ($db->query($sqlA) as $rowA)
  {
    $id = $rowA['id'];
    $sql = "SELECT * FROM posts WHERE id = '$id'";
    foreach ($db->query($sql) as $row)
    {?>


          <div class="preview container">
            <div class="row">
              <div class="alert alert-info" role="alert"><p>Diese Aufgabe wurde von <b><?php echo $row['creator']; ?></b> mit dir geteilt.</p></div>
              <h2 style="margin-top: 0; padding-top: 0;" class="col-xs-11"><?php echo $row['title']; ?></h2><p class=" col-xs-1 text-right"><span class="glyphicon glyphicon-remove" aria-hidden="true" onclick="window.location = './';"></span></p>
              <em class="col-xs-12">Erstellt am <?php echo date('d.m.Y', strtotime($row['startTime'])); ?>. | Zeit bis <?php echo date('d.m.Y', strtotime($row['endTime'])); ?>.</em>
              <p class="lead col-xs-12"><b>Beschreibung: </b><?php echo $row['description']; ?></p>
            </div>
          </div>
          <script src="scripts/show-functions.js"></script>


<?php }
    }
  } else {
    echo "Du musst dich erst anmelden. <a href='/masterplan/?m=login'>Hier</a>";
  }?>
