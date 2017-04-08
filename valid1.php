<?php

require('smtp-validate-email.php');

$from = 'skasonga@cis.mak.ac.ug'; // for SMTP FROM:<> command
$email = 'skasohtnga@pegasustechnologies.co.ug';

$validator = new SMTP_Validate_Email($email, $from);
$smtp_results = $validator->validate();
 
echo  "hi";
 
