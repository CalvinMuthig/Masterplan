$(function() {
  $("form").submit(function(event) {
    event.preventDefault();
    $(".create-btn").slideUp(200);
    //META FORMULAR
    var form = $(this);
    var action = "./backend/createPost.php",
        method = form.attr("method"),
        data   = form.serialize();

      // AJAX VERSENDEN
    $.ajax({
        url : action,
        type : method,
        data : data,
        success: function(data) {
          if (data.includes("Aufgabe erstellt.")) {
            window.location = "./";
          } else {
            $("#create-info").html(data);
            $(".create-btn").delay(500).slideDown(200);
          }
        },
        error: function() {
          $("#create-info").html("Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.");
          $(".create-btn").slideDown(200);
        },
        beforeSend: function() {
          $("#create-info").html("Sendet...");
        }
    });
  });
})
