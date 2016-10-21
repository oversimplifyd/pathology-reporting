<?php

namespace Pathology\Http\Controllers;

use PHPMailer;

class Mailer
{
    public static function sendMail(array $parameters)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = config('mail.host');
        $mail->Port = config('mail.port');
        $mail->SMTPSecure = 'tls';

        $mail->SMTPAuth = true;
        $mail->Username = config('mail.username');
        echo $mail->Username;
        $mail->Password = config('mail.password');
        $mail->setFrom(config('mail.username'), 'Pathology Reporting System');
        $mail->addAddress($parameters['address'], $parameters['name']);
        $mail->Subject = $parameters['subject'];
        $mail->msgHTML($parameters['message']);

        return $mail->send();
    }
}
