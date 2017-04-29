<?php include('inc/header.php') ?>
    <main class="container">
      <h2>Registrieren</h2>
      <p class="lead">Jetzt <b>kostenlos</b> dein Studium durchplanen und Herr der Lage sein.</p>
      <div class="row">
        <form action="./" method="post" class="col-md-6">

          <input type="text" placeholder="Vorname" class="form-control" name="name">
          <input type="text" placeholder="Nachname" class="form-control" name="lastname">
          <input type="text" placeholder="Nutzername" class="form-control" name="username">
          <input type="email" placeholder="eMail" class="form-control" name="email">

          <input type="password" placeholder="Passwort" class="form-control" name="password">
          <input type="password" placeholder="Passwort wiederholen." class="form-control" name="password2">

          <button type="submit" class="btn btn-primary register-btn" name="register">Registrieren</button>

          <div id="register-info">

          </div>
        </form>
      </div>
    </main>
    <script src="scripts/register.js"></script>
<?php include('inc/footer.php') ?>
