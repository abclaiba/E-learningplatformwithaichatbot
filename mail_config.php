<?php
/**
 * Email settings for EduLearn (Gmail SMTP).
 *
 * HOW TO MAKE EMAILS ACTUALLY SEND:
 *   1. Use a Gmail account.
 *   2. Turn on 2-Step Verification, then create an "App Password"
 *      (Google Account -> Security -> App passwords).
 *   3. Put that 16-char app password below and your Gmail address.
 *   4. Set MAIL_ENABLED to true.
 *
 * If MAIL_ENABLED is false (default) the app still works — it just
 * skips sending and logs to mail_log.txt instead, so enrollment
 * never breaks during a demo.
 */

define('MAIL_ENABLED',   true);                  // set true after filling creds
define('MAIL_HOST',      'smtp.gmail.com');
define('MAIL_PORT',      587);
define('MAIL_USERNAME',  'forproject7829@gmail.com'); // your Gmail address
define('MAIL_PASSWORD',  'evjosftvhgtjapmp');    // 16-char Gmail app password
define('MAIL_FROM_NAME', 'EduLearn');

// How many days after enrolling the course "last date" is set to.
define('COURSE_DURATION_DAYS', 30);
?>
