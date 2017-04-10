<?php
// parameters

$hubVerifyToken = 'TOKEN12345bbaacc';
$accessToken = "EAAIrEaAEYeABAKn8ZAf88b8OsSSZAhgVrM9s7QHTlYNuE5bONVce2rfsyswzbenf98nkLlatxaFgditzXMZBlZCNOuvt8vryM8G6JJfwXS4t12wt3GoFIzCMbId9tC0bUnM1rklJZC72oOYrZBzbcZANZCGINmk9zRrVuD5YXLxD6QZDZD";
 
require_once("smtpvalidateclass.php");
// check token at setup
if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
  echo $_REQUEST['hub_challenge'];
  exit;
}
// handle bot's anwser
$input = json_decode(file_get_contents('php://input'), true);
 
$senderId = $input['entry'][0]['messaging'][0]['sender']['id'];
$messageText = $input['entry'][0]['messaging'][0]['message']['text'];
 


// the email to validate  
$emails = array('solokaso@gmail.com');
// an optional sender  
$sender = 'skasonga@cis.mak.ac.ug';  
// instantiate the class  
$SMTP_Valid = new SMTP_validateEmail();  
// do the validation  
$result = $SMTP_Valid->validate($emails, $sender);  
// view results  
var_dump($result);  
//$say= $email.' is '.($result ? 'valid' : 'invalid')."\n";  
 $allKeys = array_keys($result);
$allValues = array_values($result);



if ( ! empty ($messageText ))
{
$answer = "I don't understand. Ask me 'hi'." ;
if ( $messageText == "hi" ) {
$answer = "Hello ,".$allKeys[0]." is ".$allValues[0]; ;
}
$response = [
'recipient' => [ 'id' => $senderId ],
'message' => [ 'text' => $answer ]
];
$ch = curl_init ( 'https://graph.facebook.com/v2.8/me/messages?access_token=' . $accessToken );
curl_setopt ( $ch , CURLOPT_POST , 1 );
curl_setopt ( $ch , CURLOPT_POSTFIELDS , json_encode ( $response ));
curl_setopt ( $ch , CURLOPT_HTTPHEADER , [ 'Content-Type: application/json' ]);
curl_exec ( $ch );
curl_close ($ch );
}
