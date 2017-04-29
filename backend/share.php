<?php
//Sicherheitsabfrage
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}

if (isset($_SESSION['usernamelogintrue'])) {
  include('db-con.php');
  $username = $_SESSION['usernamelogintrue'];
  $sqlA = "SELECT * FROM shares WHERE username = '$username'";
  foreach ($db->query($sqlA) as $rowA)
  {
    $id = $rowA['id'];
    $sql = "SELECT * FROM posts WHERE id = '$id' and done = 0";
    foreach ($db->query($sql) as $row)
    {?>
          <article class="col-md-3">
            <div class="inner share" onclick="window.location = '?share=<?php echo $row['id']; ?>';">
              <h3><?php echo $row['title']; ?></h3>
              <p><?php echo date('d.m.Y', strtotime($row['endTime'])); ?></p>
            </div>
          </article>

  <?php }
  }
} else {
  echo "Du musst dich erst anmelden. <a href='/masterplan/?m=login'>Hier</a>";
}?>
