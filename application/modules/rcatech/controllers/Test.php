<?php
ini_set("include_path", '/home1/rcahrube/php:' . ini_get("include_path") );
require_once "Mail.php";
$from = "test@rcahrd.in";
$to = "mailhostingserver@gmail.com";
$subject = "THis a an email sent from cPanel";
$body = "Hi,\n\nHow are you? it is a beautiful day today";
 
$host = "mail.rcahrd.in";  
$username = "test@rcahrd.in";
$password = "@1Test1@";
 
 
$headers = array ('From' => $from,'To' => $to,'Subject' => $subject);
$smtp = Mail::factory('smtp',
array ('host' => $host,
'auth' => "PLAIN",
'socket_options' => array('ssl' => array('verify_peer_name' => false)),
'username' => $username,
'password' => $password));
 
$mail = $smtp->send($to, $headers, $body);
 
if (PEAR::isError($mail)) {
echo("
" . $mail->getMessage() . "
");
} else {
 
echo("
Message successfully sent!
");
 
}
?>