<?php
// include autoloader
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
// reference the Dompdf namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
            
if (isset($_POST['submit'])) {
            $data = $_POST;

            $mail = new PHPMailer(true);

            //Server settings
            $mail->isSMTP();
            $mail->Host = 'mail.sancharakaudawa.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'webform@sancharakaudawa.com';
            $mail->Password = '3DsYeTJBZD89sf7';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipient
            $mail->setFrom('webform@sancharakaudawa.com', 'FHAM 2024');
            $mail->addAddress('gayanc@aitech.lk', 'FHAM 2024');
            // $mail->addCC('info@sancharakaudawa.com', 'FHAM 2024');
            // $mail->addCC('rizwan@cdcevents.net', 'Rizwan Khan');
            //$mail->addBCC('ameshm@aitech.lk', 'FHAM 2024');
            $mail->addBCC('gayanc@aitech.lk', 'FHAM 2024');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'FHAM 2024 - Inquiry - ' . $_POST["subject"];;
            $emailBody = '
                <h3 align="center">Sender Details</h3>
                <table border="1" width="100%" cellpadding="5" cellspacing="5">
                    <tr>
                    <td width="30%">Name</td>
                    <td width="70%">'.$_POST["name"].'</td>
                    </tr>
                    <tr>
                    <td width="30%">Email Address</td>
                    <td width="70%">'.$_POST["email"].'</td>
                    </tr>
                    <tr>
                    <td width="30%">Message</td>
                    <td width="70%">'.$_POST["message"].'</td>
                    </tr>
                </table>
            ';

            $secretKey = "6LePwJEpAAAAABtpfBUuwABTI4RkahGG4aPYzCxg";
            $responseKey = $_POST['g-recaptcha-response'];

            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";

            $response = file_get_contents($url);
            $response = json_decode($response);

            $mail->Body = $emailBody;



            if ($response->success) {
                if ($mail->Send()) {
                   $msg='<div class="alert alert-success" style="text-align: center;">Email Sent Successfully</div>';
                }
                else{
                   $msg='<div class="alert alert-danger" style="text-align: center;">Failed to send the message</div>';
                }
             }
             else{
                $msg='<div class="alert alert-danger" style="text-align: center;">Verification failed</div>';
             }
}