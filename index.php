<?php
// parameters
$hubVerifyToken = 'TOKEN12345bbaacc';
$accessToken = "EAAIrEaAEYeABAKn8ZAf88b8OsSSZAhgVrM9s7QHTlYNuE5bONVce2rfsyswzbenf98nkLlatxaFgditzXMZBlZCNOuvt8vryM8G6JJfwXS4t12wt3GoFIzCMbId9tC0bUnM1rklJZC72oOYrZBzbcZANZCGINmk9zRrVuD5YXLxD6QZDZD";
require('smtp-validate-email.php');
// check token at setup
if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
  echo $_REQUEST['hub_challenge'];
  exit;
}
// handle bot's anwser
$input = json_decode(file_get_contents('php://input'), true);

$senderId = $input['entry'][0]['messaging'][0]['sender']['id'];
$messageText = $input['entry'][0]['messaging'][0]['message']['text'];

if ( ! empty ($messageText ))
{$from = 'skasonga@cis.mak.ac.ug'; // for SMTP FROM:<> command
$email = 'sendaulaj@stanbic.com';
$validator = new SMTP_Validate_Email($email, $from);
$smtp_results = $validator->validate();
$answer = "I don't understand. Ask me 'hi'." ;
if ( $messageText == "hi" ) {
$answer= implode(" ",$smtp_results);
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
