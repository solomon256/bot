<?php
public  $result="hi tim";
 
require('smtp-validate-email.php');

$from = 'skasonga@cis.mak.ac.ug'; // for SMTP FROM:<> command
$email = 'sendaulaj@stanbic.com';

$validator = new SMTP_Validate_Email($email, $from);
$smtp_results = $validator->validate();

echo "<pre>",var_dump($smtp_results),"</pre>";

ob_start();
var_dump($smtp_results);
 $result = ob_get_clean();
echo $myString = print_r($result, TRUE);
echo  "KASONGA ".$myString;
 
?>
