var isRecording = false;
var UserDictation;
var translatedText = "";

function startRecording() {
	if (!isRecording) {
		isRecording = true;
		console.log("start");
		UserDictation.start();
	}

}

function stopRecording() {
	if (isRecording) {
		isRecording = false;
		console.log("stop");
		UserDictation.stop();
		translateAjax();
	}
}

var settings = {
    continuous:true, // Don't stop never because i have https connection
	lang:"en-GB",
    onResult:function(text){
        // text = the recognized text
        $("#input-id").val(text);
    },
    onStart:function(){
        console.log("Dictation started by the user");
    },
    onEnd:function(){
        console.log("Dictation stopped by the user");
    }
};

function speak(text) {
	artyom.say(text,{
		onStart:function(){
			console.log("Start speaking.");
		},
		onEnd:function(){
			console.log("Stop speaking");
		},
		lang: "es-ES"
	});
}

function submitMessage() {
  $(function(){
    $.ajax({
      url: "../php/submitMessage.php",
      type: "POST",
      dataType: "json",
      data: ({k: uri.search(true)['k'], message: translatedText}),
      success: function(data) {
        if (data['message'] != null) {
          $("#output-id").val("You sent a message: " + data['message']);
        }
      }
    })
  });
}

function translateAjax() {
		var toTranslate = $("#input-id").val();
		if (toTranslate == null || toTranslate == '') {
			return;
		}
		console.log("text to translate: " + toTranslate);
		var result = $.ajax({
			type: "POST",
			async: false,
			url: "../php/translate.php",
			dataType: "json",
			data: ({input: toTranslate}),
			success: function(data) {
				console.log(data);
				$("#output-id").val(data.translatedText);
				console.log(data.translatedText);
				translatedText = data.translatedText;
		//		speak(data.translatedText);
				submitMessage();
			}
		}).fail(function ( jqXHR, textStatus, errorThrown ) {
				console.log("BIG FAT FAIL");
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
		});
}

$(function() {
    	
	$("#button-translate").click(function() {
		translateAjax();
	});
	
	UserDictation = artyom.newDictation(settings);
	
	$(document).keydown(function(e) {
		 if(e.keyCode == 32){
			 startRecording();
		 }
	});
	
	$(document).keyup(function(e) {
		 if(e.keyCode == 32){
			 stopRecording();
		 }
	});
	
});
