<?php include('inc/header.php') ?>
    <main class="container">
      <h2>Anmelden</h2>
      <p class="lead">Melde dich mit deinem MasterPlan Account an.</p>
      <div class="row">
        <form action="./" method="post" class="col-md-6">

          <input type="text" placeholder="Nutzername" class="form-control" name="username">
          <input type="password" placeholder="Passwort" class="form-control" name="password">

          <button type="submit" class="btn btn-primary login-btn" name="login">Anmelden</button>
          <div id="login-info">

          </div>
        </form>
      </div>
      <div class="row">
        <p class="col-xs-12 info-text">Noch keinen Account? -> Jetzt <a href="?m=registrieren">registrieren</a>!</p>
      </div>
    </main>
    <script src="scripts/login.js"></script>
<?php include('inc/footer.php') ?>
