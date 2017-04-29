<?php
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['usernamelogintrue'])) {
include('inc/header.php') ?>
    <main class="container-fluid dashboard">
      <div class="container">
        <div class="row">

          <?php
          $username = $_SESSION['usernamelogintrue'];
          include('backend/db-con.php');
          $sql = "SELECT * FROM posts WHERE creator = '$username' AND done = 1 ORDER BY pre,endTime ASC";
          $i = 0;
          foreach ($db->query($sql) as $row) {
            $i++;
          }
          if ($i > 0) {
          ?>
          <div class="row">
            <div class="alert alert-info col-xs-12" role="alert"><p>Du hast bereits <a href="?done"><?php echo $i; ?></a> Aufgaben erledigt.</p></div>
          </div>
          <?php
          }
          $sql = "SELECT * FROM posts WHERE creator = '$username' AND done = 0 ORDER BY pre,endTime ASC";
          foreach ($db->query($sql) as $row) {
           ?>
           <article class="col-md-3">
             <?php if (date('Y-m-d', strtotime($row['endTime'])) < date('Y-m-d')) { ?>
             <div class="inner tolate" onclick="window.location = '?show=<?php echo $row['id']; ?>';">
             <?php } elseif ($row['pre'] != 1) { ?>
             <div class="inner" onclick="window.location = '?show=<?php echo $row['id']; ?>';">
               <?php } else { ?>
               <div class="inner dark" onclick="window.location = '?show=<?php echo $row['id']; ?>';">
               <?php } ?>
               <h3><?php echo $row['title']; ?></h3>
               <p><?php echo date('d.m.Y', strtotime($row['endTime'])); ?></p>
             </div>
           </article>
           <?php }
           include('backend/share.php');
           ?>
        </div>
      </div>
    </main>
<?php include('inc/footer.php');
} else {
  echo "Du musst dich erst anmelden. <a href='/masterplan/?m=login'>Hier</a>";
}?>
