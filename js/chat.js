var uri = new URI(window.location.href);

$(document).ready(function() {
  k = uri.search(true)['k'];
  if (k == undefined) {
    window.location.replace("../");
  }
  else {
    checkForMessages();
  }
});

function checkForMessages() {
  $(function(){
    $.ajax({
      url: "../php/checkForMessages.php",
      type: "POST",
      dataType: "json",
      data: ({k: uri.search(true)['k']}),
      success: function(data) {
        if (data['message'] != null) {
          //$("#output-id").val("You got a message: " + data['message']);
		  speak(data['message']);
		  $("#input-id").val(data['message']);
        }
      }
    })
  });
  setTimeout(checkForMessages, 100);
}