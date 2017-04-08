<?php

require('smtp-validate-email.php');

$from = 'skasonga@cis.mak.ac.ug'; // for SMTP FROM:<> command
$email = 'skasohtnga@pegasustechnologies.co.ug';

$validator = new SMTP_Validate_Email($email, $from);
$smtp_results = $validator->validate();
 
$lett= "<pre>",var_dump($smtp_results),"</pre>";
 echo $lett;
$let=implode("array",$lett);
?>
