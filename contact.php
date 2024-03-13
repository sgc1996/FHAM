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
            // $data = $_POST;

            $mail = new PHPMailer(true);
            // var_dump($_POST["email"], $_POST["name"]);
            // exit;
            $userEmail = $_POST["email"];
            $userName = $_POST["name"];

            //Server settings
            $mail->isSMTP();
            $mail->Host = 'mail.sancharakaudawa.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'webform@sancharakaudawa.com';
            $mail->Password = '3DsYeTJBZD89sf7';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipient
            $mail->setFrom($userEmail, $userName);
            // $mail->setFrom('mkt@fhamaldives.com', 'FHAM 2024');
            $mail->addAddress('gayanc@aitech.lk', 'FHAM 2024');
            // $mail->addAddress('mkt@fhamaldives.com', 'FHAM 2024');
            // $mail->addCC('rizwan@cdcevents.net', 'Rizwan Khan');
            // $mail->addBCC('ameshm@aitech.lk', 'FHAM 2024');
            // $mail->addBCC('gayanc@aitech.lk', 'FHAM 2024');

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

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HP8R7D199R"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-HP8R7D199R');
    </script>
    <meta charset="UTF-8">
    <!-- Meta Description -->
    <meta name="description" content="Contact Dhivehi Expo Services (Pvt) Ltd for inquiries or information about the Food and Hospitality Asia Maldives event. Reach out to our offices in Maldives and Sri Lanka for assistance with the Culinary Challenge, Barista Challenge, Mocktail Challenge, and Housekeeping Challenge.">

    <!-- Keywords -->
    <meta name="keywords" content="FHAM Contact, Contact Dhivehi Expo Services, FHAM Inquiries, Culinary Challenge Contact, Barista Challenge Contact, Mocktail Challenge Contact, Housekeeping Challenge Contact, Dhivehi Expo Services Maldives, CDC Events and Travels Sri Lanka">

    <!-- Open Graph (Facebook) -->
    <meta property="og:title" content="Contact Dhivehi Expo Services - Food and Hospitality Asia Maldives">
    <meta property="og:description" content="Contact Dhivehi Expo Services (Pvt) Ltd for inquiries or information about the Food and Hospitality Asia Maldives event. Reach out to our offices in Maldives and Sri Lanka for assistance with the Culinary Challenge, Barista Challenge, Mocktail Challenge, and Housekeeping Challenge.">
    <meta property="og:image" content="https://fhamaldives.com/img/logo.png">
    <meta property="og:url" content="https://fhamaldives.com/contact.php">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="FHAM 2024 - Food and Hospitality Asia Maldives">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Contact Dhivehi Expo Services - Food and Hospitality Asia Maldives">
    <meta name="twitter:description" content="Contact Dhivehi Expo Services (Pvt) Ltd for inquiries or information about the Food and Hospitality Asia Maldives event. Reach out to our offices in Maldives and Sri Lanka for assistance with the Culinary Challenge, Barista Challenge, Mocktail Challenge, and Housekeeping Challenge.">
    <meta name="twitter:image" content="https://fhamaldives.com/img/logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FHAM 2024 - Contact Us</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">


    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <!-- Whats App -->
    <a href="https://wa.me/+94768255584" class="whatsapp_float" target="_blank"> <i class="whatsapp-icon fa fa-whatsapp" aria-hidden="true"></i></a>
    <!-- End Whats App -->
    
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

     <!-- Header Section Begin -->
     <header class="header-section header-normal transparent" id="navbar"> <!-- Added the "transparent" class -->
        <div class="container" style="width: 1500px;">
            <div class="logo">
                <a href="./index.html">
                    <img src="img/logo.png" alt="">
                </a>
            </div>
            <div class="nav-menu">
            <nav class="mainmenu mobile-menu">
                <ul>
                    <li><a href="./index.html" >HOME</a></li>
                    <li><a href="./about-us.html">ABOUT</a></li>
                    <li><a href="Exhibition.html">EXHIBITION</a></li>
                    <li><a> CHALLENGES</a>
                        <ul class="dropdown">
                            <li><a href="Challenge-1.html" >CULINARY</a></li>
                            <li><a href="Challenge-3.html" >MOCKTAIL</a></li>
                            <li><a href="Challenge-2.html">BARISTA</a></li>
                            <li><a href="Challenge-4.html" >HOUSEKEEPING</a></li>
                        </ul>
                    </li>
                    <li><a href="gallery.html">GALLERY</a></li>
                    <li><a href="./contact.php" style="color: #0072ad;">CONATCTS</a></li>
                </ul>
            </nav>
               <a href="https://fhamaldives.com/form-db/" class="primary-btn top-btn" style="color: aliceblue;"  target="_blank"><i class="fa fa-ticket"></i> RESERVE STALLS</a>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Contact Top Content Section Begin -->
    <section class="contact-content-section">
        <div class="container-fluid">
            <div class="row">
                  <!--location-1-->
                <div class="col-lg-4">
                    <div class="cc-text set-bg" data-setbg="img/contact-content-bg-1.jpg">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-4" >
                                <div class="section-title">
                                    <h3 style="color: #ffffff; font-weight: 700;">Dhivehi Expo Services (Pvt) Ltd</h3>
                                    
                                </div>
                                <div class="cs-text">
                                    <div class="ct-address">
                                        <span>Address:</span>
                                        <p> C/O MJ & S Galholhu Aage, Majeedhee<br>
                                             Magu-20119 Male, Republic of.<br>Maldives</p>
                                    </div>
                                    <ul>
                                        <li><a>
                                            <span>Phone:</span>
                                            (+) 960 7792241 
                                        </li>
                                    
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--location-2-->
                <div class="col-lg-4">
                    <div class="cc-text set-bg" data-setbg="img/contact-content-bg-2.jpg">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-4" style="margin-top: -35px;">
                                <h5 style="color: #ffffff; font-weight: 500; padding-top: 0px; padding-bottom: 10px;">Sri Lanka Office</h5>
                                <div class="section-title">
                                  
                                    <h3 style="color: #ffffff; font-weight: 700;">CDC Events & Travels (Pvt) Ltd</h3>
                                    
                                </div>
                                <div class="cs-text">
                                    <div class="ct-address">
                                        <span>Address:</span>
                                            <p>2nd Floor,"LE CUBE”, No. 130,<br>
                                            Highlevel Road, Colombo 06,<br>
                                            Sri Lanka.</p>
                                    </div>
                                    <ul>
                                        <li><a>
                                            <span>Phone:</span>
                                            (+94) 11 251 5785 
                                        </li>
                                    
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 
                  <!--location-3-->
                  <div class="col-lg-4">
                    <div class="cc-text set-bg" data-setbg="img/contact-content-3.jpg">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-4">
                                <div class="section-title">
                                    <h2 style="color: #fff; margin-bottom: 20px; text-align: left;">For Inquiries</h2>
                                    <div class="contact-info" style="text-align: left;">
                                        <div style="margin-bottom: 10px;">
                                            <i class="fa fa-phone" style="padding-right: 10px;"></i><a href="tel:+94768255584 ">(+94) 76 8255584 </a>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <i class="fa fa-phone" style="padding-right: 10px;"></i><a href="tel:+94773959835 ">(+94) 77 3959835 </a>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <i class="fa fa-envelope" style="padding-right: 10px;"></i><a href="mailto:mkt@fhamaldives.com">mkt@fhamaldives.com</a>
                                        </div>
                                        <div>
                                            <i class="fa fa-envelope" style="padding-right: 10px;"></i><a href="mailto: rizwan@cdcevents.net"> rizwan@cdcevents.net</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Contact Top Content Section End -->

    <style>
        .contact-info div i, .contact-info div a {
            color: #fff;
            transition: color 0.3s;
        }
    
        .contact-info div:hover i, .contact-info div:hover a {
            color: red;
        }
    </style>



    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad">
    <?php print_r($msg); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Contact Us</h2>
                        <p>Don’t hesitate to contact us if you need any Information</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="comment-form contact-form" method="post" action="">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-lg-4">
                                <input type="email" name="email" class="form-control" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" style="height: 55px;">
                            </div>
                            <div class="col-lg-12">
                                <textarea class="form-control" name="message" rows="4" placeholder="Message"></textarea>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="g-recaptcha" data-sitekey="6LePwJEpAAAAACskXQUSTDJEFLGHXyxMfFXrsCzf"></div>
                            </div>
                            <div class="col-lg-12">
                                <button class="site-btn" name="submit" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form Section End -->

     

  <!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container" style="max-width: 1500px;">
      
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-text">
                    <div class="ft-logo">
                        <a href="#" class="footer-logo"><img src="img/logo-pld.png" alt=""></a>
                    </div>
                    <div class="con-info custom-font" style="color: aliceblue; ">

                        <ul>
                            <li style="margin-bottom: 10px;"><a href="Challenge-1.html"><i class="fa fa-trophy " style="padding-right: 10px;"></i>Culinary Challenge</a></li>
                            <li style="margin-bottom: 10px;"><a href=""><i class="fa fa-trophy " style="padding-right: 10px;"></i>Barista Challenge</a></li>
                            <li style="margin-bottom: 10px;"><a href=""><i class="fa fa-trophy " style="padding-right: 10px;"></i>Mocktail Challenge</a></li>
                            <li style="margin-bottom: 10px;"><a href=""><i class="fa fa-trophy " style="padding-right: 10px;"></i>Housekeeping Challenge</a></li>
                          
                          
                        </ul>
                    </div>
                
                   
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-text">
                    <div class="ft-logo">
                        <a href="#" class="footer-logo"><img src="img/divehi-logo-small.png" alt="Dhvehi Cooperations"></a>
                    </div>
                    <div class="con-info custom-font" style="color: aliceblue;">
                        <ul>
                            <li style="margin-bottom: 10px;"><a style="pointer-events: none;"><i class="fa fa-map-marker" style="padding-right: 15px;"></i>C/O MJ & S
                                Galholhu Aage,
                                Majeedhee <br>Magu-20119
                                Male, Republic Of. <br>Maldives</a></li>
                            <!--<li style="margin-bottom: 10px;"><a href="mailto:mkt@fhamaldives.com"> <i class="fa fa-envelope" style="padding-right: 10px;"></i>info@fhamaldives.com</a></li>-->
                            <li style="margin-bottom: 10px;"><a href="tel:+9607792241"><i class="fa fa-phone" style="padding-right: 10px;"></i> (+960) 7792241</a> </li>
                          
                        </ul>
                    </div>
                
                    
                </div>
            </div>

            <div class="col-lg-3">
                <div class="footer-text">
                    <div class="ft-logo">
                        <a href="#" class="footer-logo"><img src="img/cdc-logo-small.png" alt="CDC Events and Travels"></a>
                    </div>
                    <div class="con-info custom-font" style="color: aliceblue;">
                        <ul>
                           
                            <li style="margin-bottom: 10px;"><a style="pointer-events: none;"><i class="fa fa-map-marker" style="padding-right: 10px;"></i>2nd Floor,"LE CUBE”, No. 130, <br>Highlevel Road, Colombo 06, <br>Sri Lanka.</a></li>
                            <!--<li style="margin-bottom: 10px;"> <a href="mailto:mkt@fhamaldives.com"><i class="fa fa-envelope" style="padding-right: 10px;"></i>info@cdcevents.net</a></li>-->
                            
                            <li style="margin-bottom: 10px;"><a href="tel:+94112515785"><i class="fa fa-fax" style="padding-right: 10px;"></i> (+94) 11 251 5785 </a></li>
                        </ul>
                    </div>
                    
                    
                
                </div>
            </div>

            <div class="col-lg-3">
                <div class="footer-text">
                    <div class="ft-logo">
                        <h4  style="margin-bottom: 40px; color: white; font-weight: bold;">INQUARIES</h4>
                    </div>
                    <div class="con-info custom-font" style="color: aliceblue;">
                        <ul>
                          
                            <li style="margin-bottom: 10px;"><i class="fa fa-phone" style="padding-right: 10px;"></i> <a href="tel:+94768255584 ">(+94) 76 8255584</a> </li>
                            <li style="margin-bottom: 10px;"><i class="fa fa-phone" style="padding-right: 10px;"></i> <a href="tel:+94773959835">(+94) 77 3959835 </a></li>
                            <li style="margin-bottom: 10px;"><i class="fa fa-envelope" style="padding-right: 10px;"></i> <a href="mailto:mkt@fhamaldives.com">mkt@fhamaldives.com</a></li>
                            <li style="margin-bottom: 10px;"><i class="fa fa-envelope" style="padding-right: 10px;"></i> <a href="mailto: rizwan@cdcevents.net">rizwan@cdcevents.net</a></li>
                        </ul>
                    </div>
                    
                    
                
                </div>
            </div>

           

        </div>

       

        <div class="partner-logo-1 owl-carousel" >
            <a href="https://worldchefs.org/" class="pl-table" target="_blank">
                <div class="pl-tablecell">
                    <img src="img/partner-logo/partner-1.png" alt="">
                </div>
            </a>
            <a href="https://www.facebook.com/ChefsGuildofMaldives/" class="pl-table" target="_blank">
                <div class="pl-tablecell">
                    <img src="img/partner-logo/partner-2.png" alt="">
                </div>
            </a>
            <a href="https://www.chefsguildoflanka.org/" class="pl-table" target="_blank">
                <div class="pl-tablecell">
                    <img src="img/partner-logo/partner-3.png" alt="">
                </div>
            </a>
            <a href="https://www.facebook.com/wicsglobal/" class="pl-table" target="_blank">
                <div class="pl-tablecell">
                    <img src="img/partner-logo/partner-4.png" alt="" target="_blank">
                </div>
            </a>
            <a href="https://mncci.org.mv/" class="pl-table">
                <div class="pl-tablecell">
                    <img src="img/partner-logo/partner-5.png" alt="" target="_blank">
                </div>
            </a>
            <a href="http://maldiveshousekeepers.com/" class="pl-table" target="_blank">
                <div class="pl-tablecell">
                    <img src="img/partner-logo/partner-6.png" alt="">
                </div>
            </a>
           
            
        </div>

        <div class="copyrights" >
        
            <p style="font-size: 16px;">FHAM 2024 Copyright © 2024 All rights reserved | Design by <a href="#0">AI TECH</a>©.</p>
        </div> 

    </div>
</footer>
    <!-- Footer Section End -->
    
<div id="back-to-top">↑</div>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>