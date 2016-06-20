<?php

require_once 'PHPMailerAutoload.php';

class SendMail {

    public static function sendNewMail($email, $subject, $body) {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'studentadvisor.mailer@gmail.com';
        $mail->Password = 'studentadvisor1';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->From = 'studentadvisor.mailer@gmail.com';
        $mail->FromName = 'Student-advisor [no-reply]';
        $mail->addAddress($email);
        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $body;
        return $mail->send();
    }

    
    public static function sendPasswordResetMail ($username, $newPassword, $email) {
        $body =   'Postovani/a ' . $username . ',<br/><br/><br/>'
                . 'Vasa lozinka je promenjena.<br/><br/><br/>'
                . '<b>Vasi podaci za logovanje su:</b><br/><br/>'
                . '<b>Korisnicko ime:</b> ' . $username . '<br/>'
                . '<b>Lozinka:</b> ' . $newPassword;
        return SendMail::sendNewMail($email, 'Katedra za RTI: Vasa lozinka je resetovana', $body);

    }
    
}