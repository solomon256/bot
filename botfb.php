<?php

require( 'smtp-validate-email.php' );
$from = 'skasonga@cis.mak.ac.ug' ; // for SMTP FROM:<> command
$email = 'someo@gmail.com' ;
$validator = new SMTP_Validate_Email ( $email , $from );
$result = $validator -> validate();
var_dump ( $result);


$allKeys = array_keys($result);
$allValues = array_values($result);
echo $allKeys[0]." is ".$allValues[0];
