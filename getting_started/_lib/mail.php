<?php 

    require '../_lib/phpmailer/PHPMailerAutoload.php';
 
    // CONFIG YOUR FIELDS
    //============================================================
    $name =     filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email =    filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    //$formMessage =  filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    // CONFIG YOUR EMAIL MESSAGE
    //============================================================
    $message = '<p>Subscriber service request </p>';
    $message .= '<p>Name: ' . $name . '</p>';
    $message .= '<p>Email: ' . $email . '</p>';
    //$message .= '<p>Message: ' . $formMessage .'</p>';

    // CONFIG YOUR MAIL SERVER
    //============================================================
    $mail = new PHPMailer;
    $mail->isSMTP();                                    // Enable SMTP authentication
    $mail->SMTPAuth = true;                             // Set mailer to use SMTP
    //Sign up with MAIL GUN
    $mail->Host = 'ph102.peopleshostshared.com';                // Specify main and backup server (this is a fake name for the use of this example)             

    $mail->Username = 'info@oliveryarbrough.com';                  // SMTP username
    $mail->Password = 'OliyarcatA201';                         // SMTP password
    $mail->SMTPSecure = 'tls';                          // Enable encryption, 'ssl' also accepted                                   
    $mail->Port = 587;                        

    $mail->From = $email;
    $mail->FromName = $name;
    $mail->AddReplyTo($email,$name);
    $mail->addAddress('info@oliveryarbrough.com', $name);  // Add a recipient

    $mail->WordWrap = 50;                               // Set word wrap to 50 characters
    $mail->isHTML(true);                                // Set email format to HTML

    $mail->Subject = 'Subscription request';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        $data['error']['title'] = 'Message could not be sent.';
        $data['error']['details'] = 'Mailer Error: ' . $mail->ErrorInfo;
       exit;
    }

    $data['success']['title'] = 'Message has been sent';

    echo json_encode($data);
?>