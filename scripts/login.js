$(function() {
  $("form").submit(function(event) {
    event.preventDefault();
    $(".login-btn").slideUp(200);
    //META FORMULAR
    var form = $(this);
    var action = "./backend/login.php",
        method = form.attr("method"),
        data   = form.serialize();

      // AJAX VERSENDEN
    $.ajax({
        url : action,
        type : method,
        data : data,
        success: function(data) {
          if (data == "login") {
            window.location = "./";
          } else {
            $("#login-info").html(data);
            $(".login-btn").delay(500).slideDown(200);
          }
        },
        error: function() {
          $("#login-info").html("Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.");
          $(".login-btn").slideDown(200);
        },
        beforeSend: function() {
          $("#login-info").html("Sendet...");
        }
    });
  });
})
