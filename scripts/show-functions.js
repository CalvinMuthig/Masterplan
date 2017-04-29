$(function() {
  doThatFunc("#delete", true, "delete");
  doThatFunc("#done", false, "done");


  function doThatFunc(btn, conf, link) {
    $(btn).on("click", function() {
      var url = "./backend/"+link+".php";
          if (conf === true) {
            confirmS = confirm("Möchtest du diese Aufgabe löschen?");
          } else {
            confirmS = true;
          }
      var id = $(btn).data("id");
      var title = $(btn).data("title");
      if (confirmS) {
        $.ajax({
            url : url,
            type : 'POST',
            data :{
              id : id,
              title : title
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
            },
            beforeSend: function() {
              $(btn).val("Bearbeitung");
            }
        });
      }
    });
  }
})
