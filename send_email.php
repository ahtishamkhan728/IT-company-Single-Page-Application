<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
     
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Set debugging level
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com'; // Update with your SMTP host
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
    // Try different SMTP ports
    // $ports = [587, 465, ]; 
    

        $mail->Port = 25;

        $mail->Username = 'moohibmobi@gmail.com';
        $mail->Password = '';

        $mail->setFrom($email, $name);
        $mail->addAddress("dave@example.com", "Dave");
        $mail->Subject = $subject;
        $mail->Body = $message;

        try {
            $mail->send();
            echo "Email sent successfully using port: 25";

        } catch (Exception $e) {
            echo "Email sending failed using port: 25. Error: {$mail->ErrorInfo}";
            // Try next port

        }
}

?>
