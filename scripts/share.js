$(function() {
    $("#share").on("click", function() {
      var url = "./backend/shareThis.php";
      var id = $("#share").data("id");
      var user = $("#username-input").val();
        $.ajax({
            url : url,
            type : 'POST',
            data :{
              id : id,
              username : user
            },

            success: function(data) {
              if (data === "ok") {
                window.location = "./";
              } else {
                alert(data);
              }
            },
            error: function() {
              alert("Ein Fehler ist aufgetreten.");
            }
        });
    });
});
