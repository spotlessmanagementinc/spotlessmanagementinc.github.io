<?php

$name = $_POST['name'];
$request = $_POST['request'];

$to = "benlevels@gmail.com";
$subject = "New Form Enquiry";
$body = "This is an automated message. Please don't reply to this email. \n\n $request";


mail ($to,$subject,$body);


echo "Messsage Sent! Click here to send another email";

?>