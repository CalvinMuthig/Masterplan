<?php //Sicherheitsabfrage
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['usernamelogintrue'])) {
  include('pages/inc/header.php') ?>

    <main class="container-fluid dashboard">
      <div class="container">
        <div class="row">
          <h2 class="col-xs-12">Erledigte Aufgaben</h2>
          <?php
          $username = $_SESSION['usernamelogintrue'];
          include('backend/db-con.php');

          $sql = "SELECT * FROM posts WHERE creator = '$username' AND done = 1 ORDER BY pre,endTime ASC";
          foreach ($db->query($sql) as $row) {
           ?>
           <article class="col-md-3">
             <div class="inner" onclick="window.location = '?done&show=<?php echo $row['id']; ?>';">
               <h3><?php echo $row['title']; ?></h3>
               <p><?php echo date('d.m.Y', strtotime($row['endTime'])); ?></p>
             </div>
           </article>
           <?php } ?>
        </div>
      </div>
    </main>
<?php include('pages/inc/footer.php');
} else {
  echo "Du musst dich erst anmelden. <a href='/masterplan/?m=login'>Hier</a>";
}?>
