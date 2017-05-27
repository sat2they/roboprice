<?php 
define('BOT_TOKEN', 'API_CODE');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
	
// read incoming info and grab the chatID
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatID = $update["message"]["chat"]["id"];
$messageTXT = $update["message"]["text"];	

// compose reply
$reply =  sendMessage($messageTXT);
		
// send reply
$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;
file_get_contents($sendto);

function sendMessage($messageTXT){
$message = "I am a baby bot.";
if ($messageTXT=="GO")
return "TestOK";
else
return $message;
}
