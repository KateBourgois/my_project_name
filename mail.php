<?php

require_once "Mail.php";

$from = "Web Master <huguesbourgois@skynet.be>";
$to = "Nobody <alis-c.82@mail.ru>";
$subject = "Test email using PHP SMTP\r\n\r\n";
$body = "This is a test email message";

$host = "relay.skynet.be";
$username = "huguesbourgois@skynet.be";
$password = "cat1tige";
$port = "587";
$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password,
     'port' => $port));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
} else {
  echo("<p>Message successfully sent!</p>");
}


?>
