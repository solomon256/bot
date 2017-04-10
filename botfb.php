<?php

require( 'smtp-validate-email.php' );
$from = 'skasonga@cis.mak.ac.ug' ; // for SMTP FROM:<> command
$email = 'someo@gmail.com' ;
$validator = new SMTP_Validate_Email ( $email , $from );
$result = $validator -> validate();
var_dump ( $result);


$allKeys = array_keys($result);
$allValues = array_values($result);
echo $allKeys[0]."\n is ".$allValues[0];
echo $allKeys[1]." is ".$allValues[1];
echo $allKeys[2]." is ".$allValues[2];
echo $allKeys[3]." is ".$allValues[3];
echo $allKeys[4]." is ".$allValues[4];
echo $allKeys[5]." is ".$allValues[5];
