<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>MasterPlan App</title>

    <!-- Styles -->
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/main.css">

    <!-- Scripts -->
    <script src="scripts/jquery-3.1.1.min.js"></script>
  </head>
  <body>
    <header  class="container-fluid">
      <div class="container">
        <div class="row">
          <h1 class="col-xs-8"><a href="./">MASTER<b>PLAN</b></a></h1>
          <?php if(!isset($_SESSION['usernamelogintrue'])) {?>
            <p class="col-xs-4 text-right"><a href="?m=login">Login</a> | <a href="?m=registrieren">Registrieren</a></p>
          <?php } else { ?>
            <p class="col-xs-4 text-right"><a href="?m=logout">Abmelden</a> | <a href="?m=add">Neu</a></p>
          <?php } ?>
        </div>
      </div>
    </header>
