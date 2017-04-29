$(function() {
  $("form").submit(function(event) {
    event.preventDefault();
    $(".register-btn").slideUp(200);
    //META FORMULAR
    var form = $(this);
    var action = "./backend/newUser.php",
        method = form.attr("method"),
        data   = form.serialize();

      // AJAX VERSENDEN
    $.ajax({
        url : action,
        type : method,
        data : data,
        success: function(data) {
          if (data == "?m=login") {
            window.location = data;
          } else {
            $("#register-info").html(data);
            $(".register-btn").delay(500).slideDown(200);
          }
        },
        error: function() {
          $("#register-info").html("Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.");
          $(".register-btn").slideDown(200);
        },
        beforeSend: function() {
          $("#register-info").html("Sendet...");
        }
    });
  });
})
