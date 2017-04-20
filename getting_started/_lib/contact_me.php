<?php
// Check for empty fields
if(empty($_POST['name'])        ||
   empty($_POST['email'])       ||

   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
    echo "No arguments Provided!";
    return false;
   }

$name = $_POST['name'];
$email_address = $_POST['email'];


// Create the email and send the message
$to = 'info@oliveryarbrough.com'; // Add your email address inbetween the '' replacing            
//yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Oliver Yarbrough Subscription Form:  $name";
$email_body = "Exciting News! You just received a new subscription from OliverYarbrough.com.\n\n"."Here are the        
details:\n\nName: $name\n\nEmail: $email_address";
$headers = "From: noreply@oliveryarbrough.com\n"; // This is the email address the generated message will     
//be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address"; 
mail($to,$email_subject,$email_body,$headers);
return true;            
?>