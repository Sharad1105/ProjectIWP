<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path if necessary

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $to_email = $_POST["email"];
    
    $mail = new PHPMailer(true);

    try {
        // SMTP server configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sharadbnair@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'kgve qpps zazw wjvh'; // Replace with your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email settings
        $mail->setFrom('sharadbnair@gmail.com', 'Sharad B. Nair'); // Replace with your name
        $mail->addAddress($to_email);
        $mail->Subject = 'Thank You for Your Response';
        $mail->Body = "Thank you for your response. Sharad will get in touch with you soon.";

        // Send email
        $mail->send();
        echo "Thank you for your submission. A confirmation email has been sent to $to_email.";
    } catch (Exception $e) {
        echo "Email sending failed. Error: {$mail->ErrorInfo}";
    }
}
?>
