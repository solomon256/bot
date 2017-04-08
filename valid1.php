<?php

require('smtp-validate-email.php');

$from = 'skasonga@cis.mak.ac.ug'; // for SMTP FROM:<> command
$email = 'solokaso@gmail.com';

$validator = new SMTP_Validate_Email($email, $from);
$smtp_results = $validator->validate();

echo "<pre>",var_dump($smtp_results),"</pre>";

?>
