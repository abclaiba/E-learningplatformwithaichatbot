<?php
/**
 * Sends the "course last date" email to a student after they enrol.
 * Uses Gmail SMTP via PHPMailer when MAIL_ENABLED is true; otherwise it
 * just records the message in mail_log.txt so the demo never breaks.
 *
 * Returns true on success (sent or logged), false on hard failure.
 */

require_once __DIR__ . '/mail_config.php';
require_once __DIR__ . '/PHPMailer/src/Exception.php';
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_deadline_email($to_email, $to_name, $course_name, $deadline)
{
    $pretty_date = date('l, d F Y', strtotime($deadline));

    $subject = "EduLearn — Last date for $course_name";

    $body =
        "Hi $to_name,\n\n" .
        "You have successfully enrolled in \"$course_name\".\n\n" .
        "Please complete this course by its LAST DATE: $pretty_date.\n\n" .
        "Log in to your dashboard to continue learning and track your progress.\n\n" .
        "Happy learning,\nThe EduLearn Team";

    // If email isn't configured, log instead of sending (keeps demo working)
    if (!MAIL_ENABLED) {
        @file_put_contents(
            __DIR__ . '/mail_log.txt',
            "[" . date('Y-m-d H:i:s') . "] TO: $to_email\n" .
            "SUBJECT: $subject\n$body\n" .
            str_repeat('-', 50) . "\n",
            FILE_APPEND
        );
        return true;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = MAIL_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = MAIL_USERNAME;
        $mail->Password   = MAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = MAIL_PORT;

        $mail->setFrom(MAIL_USERNAME, MAIL_FROM_NAME);
        $mail->addAddress($to_email, $to_name);

        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return true;

    } catch (Exception $e) {
        // Never let a mail failure break enrollment — just log it
        @file_put_contents(
            __DIR__ . '/mail_log.txt',
            "[" . date('Y-m-d H:i:s') . "] SEND FAILED to $to_email: " .
            $mail->ErrorInfo . "\n",
            FILE_APPEND
        );
        return false;
    }
}
?>
