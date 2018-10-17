<?php

$to = $_POST['to'];
$from = $_POST['from'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$body = "This is an automated message. Please don't reply to this email. \n\n $message"; 
 
$headers = "From: $from";

$headers($to,$subject,$body,$headers);
echo "Message Sent! <a href='email.html'>Click sini<> to sent another email";
 
?>