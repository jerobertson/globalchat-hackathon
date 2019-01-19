var uri = new URI(window.location.href);

$(document).ready(function() {
  k = uri.search(true)['k'];
  if (k == undefined) {
    login();
  }
  else {
    join();
  }
});

function login() {
  $(function(){
    $.ajax({
      url: "php/login.php",
      type: "POST",
      dataType: "json",
      success: function(data) {
        window.location.replace("?k=" + data['k']);
      }
    })
  });
}

function join() {
  $(function(){
    $.ajax({
      url: "php/join.php",
      type: "POST",
      dataType: "json",
      data: ({k: uri.search(true)['k']}),
      success: function(data) {
        $("#chat-link").text(uri.origin() + uri.path() + "?k=" + data['k2']);
        prepareChat();
      }
    })
  });
}

function prepareChat() {
  $(function(){
    $.ajax({
      url: "php/prepareChat.php",
      type: "POST",
      dataType: "json",
      data: ({k: uri.search(true)['k']}),
      success: function(data) {
        if (data['ready'] != null) {
          window.location.replace("chat/?k=" + uri.search(true)['k']);
        }
      }
    })
  });
  setTimeout(prepareChat, 1000);
}