<?php

require('smtp-validate-email.php');

$from = 'skasonga@cis.mak.ac.ug'; // for SMTP FROM:<> command
$email = 'sendaulaj@yahoo.com';

$validator = new SMTP_Validate_Email($email, $from);
echo $smtp_results = $validator->connect();
//echo  print_r($smtp_results);
//"<pre>",var_dump($smtp_results),"</pre>";
// echo $list;
//cho  $smtp_results->email;
?>
