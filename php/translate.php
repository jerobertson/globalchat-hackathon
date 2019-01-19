<?php

if ($_POST['input'] != NULL) {
 	$text = $_POST['input'];
 	$textEnc = urlencode($text);
 	$source = "en";
 	$target = "es";
	
 	$curl = curl_init();
 	curl_setopt_array($curl, array(
 			CURLOPT_URL => "https://gateway.watsonplatform.net/language-translator/api/v2/translate?source=$source&target=$target&text=$textEnc",
 			CURLOPT_USERPWD => "11679e59-81c0-47e7-905e-3e09b64c5f11:ztspw4EB8QkW",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false
 	));
 	$translation = curl_exec($curl);
	//$x = var_export(curl_error($curl), true);
 	curl_close($curl);
	echo json_encode(array("translatedText" => $translation));
}


?>