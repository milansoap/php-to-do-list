
$(document).ready(function() {

  $('.aModalEdit').on('click', function () {

    $('#editModalId').modal('show');


    var id = document.getElementById("dom-id");
    var idData = id.textContent;

    var title = document.getElementById("dom-title");
    var titleData = title.textContent;

    var text = document.getElementById("dom-text");
    var textData = text.textContent;

   



    $('#inputTitle').val(titleData)
    $('#inputText').val(textData)
    $('#inputId').val(idData)

  });


});
