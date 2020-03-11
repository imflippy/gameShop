<?php
/*
* @created 05/03/2020 - 10:27 PM
* @author flippy
*/

namespace App\Http\Services;


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class SendMailer
{


    public static function sendMail($title, $subject, $body, $reciver) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';

            $mail->SMTPAuth = true;
            $mail->Username = 'filipmail345@gmail.com';
            $mail->Password = 'filip!mail#45';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('happenings1566@gmail.com', $title);
            $mail->addAddress($reciver);

            $mail->isHTML(true);
            // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
//                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            return response(["Error with maler" => $mail->ErrorInfo], 500);
        }

    }
}
