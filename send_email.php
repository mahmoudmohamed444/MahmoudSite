<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // تأكد من وجود المكتبة عبر Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // إعدادات SMTP
        $mail->isSMTP();
        $mail->Host = 'mabudawaba2002@gmail.com'; // خادم Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'mabudawaba2002@gmail.com'; // بريد Gmail الخاص بك
        $mail->Password = 'ZeroMahmoud'; // كلمة مرور التطبيق
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // إعدادات البريد
        $mail->setFrom('mabudawaba2002@gmail.com', 'Mahmoud Mohamed');
        $mail->addAddress('mabudawaba2002@gmail.com'); // البريد المستلم
        $mail->addReplyTo($email, $name);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "Name: $name<br>Email: $email<br><br>Message:<br>$message";

        $mail->send();
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
?>
