<?php

require_once("smtpvalidateclass.php");

// the email to validate  
$emails = array('solokaso@gmal.com');
// an optional sender  
$sender = 'skasonga@cis.mak.ac.ug';  
// instantiate the class  
$SMTP_Valid = new SMTP_validateEmail();  
// do the validation  
$result = $SMTP_Valid->validate($emails, $sender);  
// view results  
var_dump($result);  
$say= $email.' is '.($result ? 'valid' : 'invalid')."\n";  
 $allKeys = array_keys($result);
$allValues = array_values($result);
echo $allKeys[0]." is ".$allValues[0];
