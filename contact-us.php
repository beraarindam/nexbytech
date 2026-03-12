<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

$msg = '';
$msgClass = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $subject_txt = htmlspecialchars(trim($_POST['subject'] ?? 'Contact Form Inquiry'));
    $service = htmlspecialchars(trim($_POST['service_type'] ?? 'Not specified'));
    $address = htmlspecialchars(trim($_POST['address'] ?? ''));
    $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

    if (empty($recaptchaResponse)) {
        $msg = 'Please complete the reCAPTCHA.';
        $msgClass = 'alert-danger';
    } else {
        // Using Google's standard test keys for localhost testing
        $secret = '6LdMYIgsAAAAABBP6x6qq1HkqHOlpBgfXw9TI4UP';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$recaptchaResponse);
        $responseData = json_decode($verifyResponse);

        if ($responseData && $responseData->success) {
            $to = 'abera0275@gmail.com'; // Admin email
            $subject = "New Inquiry: $subject_txt";
            $body = "Name: $name\nEmail: $email\nPhone: $phone\nService: $service\nSubject: $subject_txt\nMessage/Address:\n$address";

            // Optional: send data to Google Sheets via Apps Script Web App
            // Replace the URL below with your deployed Apps Script Web App URL.
            $googleScriptUrl = 'https://script.google.com/macros/s/YOUR_SCRIPT_ID/exec';
            $sheetPayload = [
                'timestamp' => date('c'),
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'service' => $service,
                'subject' => $subject_txt,
                'message' => $address,
            ];
            // Fire-and-forget request; ignore response/errors so the form still works
            @file_get_contents($googleScriptUrl . '?' . http_build_query($sheetPayload));

            // ---------- PHPMailer (SMTP) ----------
            $mail = new PHPMailer(true);

            try {
                // Server settings - replace with your real SMTP details
                $mail->isSMTP();
                $mail->Host       = 'smtp.hostinger.com';           // e.g. smtp.yourdomain.com
                $mail->SMTPAuth   = true;
                $mail->Username   = 'info@nexbytechsolutions.com';       // e.g. no-reply@nexbytechsolutions.com
                $mail->Password   = '@Arindam2003';       // SMTP password or app password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // or ENCRYPTION_SMTPS
                $mail->Port       = 587;                        // 587 TLS, 465 SSL

                // Recipients
                $mail->setFrom('info@nexbytechsolutions.com', 'Nexbytech Website');
                $mail->addAddress($to);

                // Content
                $mail->Subject = $subject;
                $mail->Body    = $body;

                $mail->send();
                $msg = 'Your message has been sent successfully!';
                $msgClass = 'alert-success';
            } catch (Exception $e) {
                $msg = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                $msgClass = 'alert-warning';
            }
        } else {
            $msg = 'reCAPTCHA verification failed. Please try again.';
            $msgClass = 'alert-danger';
        }
    }
}
?>
<?php include 'header.php'; ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

         <div class="site-main">
            <!--contact-section start-->
            <section class="prt-row contact-section bg-base-dark clearfix">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="title-box text-center">
                           <div class="breadcrumb-wrapper mb-20">
                              <span>
                              <a title="Homepage" href="index">Home</a>
                              </span>
                              <span class="prt-bread-sep"><i class="fa-angle-double-right fa"></i></span>
                              <span>Contact us</span>
                           </div>
                           <div class="page-title-heading m-0">
                              <h1 class="">Get a Free Quote for Your Web Project</h1>
                           </div>
                           <!-- /.page-title-captions -->
                        </div>
                     </div>
                  </div>
                  <div class="row align-items-center">
                     <div class="col-lg-8">
                        <div class="contact-form-block">
                           <?php if($msg != ''): ?>
                              <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
                           <?php endif; ?>
                           <form action="contact-us" method="POST" class="wrap-form query_form-1">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <h3 class="contact-form-title">Tell us about your web project</h3>
                                 </div>
                                 <div class="col-lg-6 col-sm-12">
                                    <span class="text-input">
                                       <input type="text" name="name" value="" placeholder="Your name" required="required">
                                    </span>
                                 </div>
                                 <div class="col-lg-6 col-sm-12">
                                    <span class="text-input">
                                        <input type="text" name="email" value="" placeholder="Email address" required="required">
                                    </span>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12">
                                    <span class="text-input">
                                       <input type="text" name="phone" placeholder="Phone number" value="" required="required">
                                    </span>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12">
                                    <span class="text-input">
                                       <input type="text" name="subject" placeholder="Subject" value="" required="required">
                                    </span>
                                 </div>
                                 <div class="col-lg-12">
                                    <span class="text-input">
                                        <textarea  name="address" placeholder="Address or Message" required="required" rows="4" cols="50"></textarea>
                                    </span>
                                 </div>
                                 <div class="col-lg-12 mt-3">
                                    <label class="d-block mb-2 text-base-white">Select the services you are interested in</label>
                                    <div class="row">
                                       <div class="col-sm-6 mb-2">
                                          <label class="d-flex align-items-center">
                                             <input type="radio" name="service_type" value="Website Design" required style="margin-right:8px;">
                                             <span>Website Design</span>
                                          </label>
                                       </div>
                                       <div class="col-sm-6 mb-2">
                                          <label class="d-flex align-items-center">
                                             <input type="radio" name="service_type" value="Website Development" style="margin-right:8px;">
                                             <span>Website Development</span>
                                          </label>
                                       </div>
                                       <div class="col-sm-6 mb-2">
                                          <label class="d-flex align-items-center">
                                             <input type="radio" name="service_type" value="Education CRM" style="margin-right:8px;">
                                             <span>Education CRM</span>
                                          </label>
                                       </div>
                                       <div class="col-sm-6 mb-2">
                                          <label class="d-flex align-items-center">
                                             <input type="radio" name="service_type" value="Android App Development" style="margin-right:8px;">
                                             <span>Android App Development</span>
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 mb-4">
                                    <div class="g-recaptcha" data-sitekey="6LdMYIgsAAAAAI6ggz9tDwb7ff_X8uRRpIPkQwyn"></div>
                                 </div>
                                 <div class="row align-items-center">
                                    <div class="col-xl-3 col-md-4 col-sm-4 pr-0">
                                       <button class="prt-btn prt-btn-size-md prt-btn-shape-rounded prt-btn-style-fill prt-btn-color-skincolor" type="submit">Submit now</button>
                                    </div>
                                    <div class="col-sm-6 p-0 ml_20 res-575-ml-0 res-767-pl-20 res-767-pr-20 res-575-mt-20">
                                       <div class="ctn-footer-desc">
                                          <p class="m-0">Been here before? <a href="#" class="tm-text-underline"> Check your query</a> </p>  
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-lg-4 pl-35 res-991-pl-15 res-991-mt-30">
                        <div class="row">
                           <div class="col-lg-12 col-md-6 col-sm-6">
                              <div class="featured-icon-box style3 mb-50  res-991-mb-0 res-575-mb-20 mt-0">
                                 <div class="featured-icon">
                                    <div class="prt-icon">
                                       <i class="flaticon-phone-call"></i>
                                    </div>
                                 </div>
                                 <div class="featured-content">
                                    <div class="featured-title">
                                       <h3>Need help?</h3>
                                    </div>
                                    <div class="featured-desc">
                                       <p class="m-0"> <a href="tel:0055645000">+00 55 645 000 </a>  /   <a href="8005559876">+1 (800) 555-9876</a><br> <a href="mailto:information@business.com">information@business.com</a></p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-6 col-sm-6">
                              <div class="featured-icon-box style3 mt-0 ">
                                 <div class="featured-icon">
                                    <div class="prt-icon">
                                       <i class="flaticon-pin-map"></i>
                                    </div>
                                 </div>
                                 <div class="featured-content">
                                    <div class="featured-title">
                                       <h3>Location info</h3>
                                    </div>
                                    <div class="featured-desc">
                                       <p class="elementor-icon-box-description mb-0"> 1234 East 27th Street, Fifteen Floor, NY 1010<br> <a href="#" class="text-decoration-underline" target="_blank" rel="noopener">Location on map</a></p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!--contact-section end-->
            <!--faq-section start-->
            <section class="prt-row faq-section bg-base-grey clearfix">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12 m-auto mb-25">
                        <div class="section-title-block text-center">
                           <div class="subtitle-wrapper">
                              <div class="subtitle">
                                 <h2>FAQ for nexbytech</h2>
                              </div>
                           </div>
                           <div class="section-title">
                              <h3 class="title">Some most popular <span>question</span></h3>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-4 col-md-5 col-sm-5 col-xs-6 col-10 m-auto mt-0 mb-0">
                        <div class="imagestyle-one">
                           <div class="prt-single-image-wrapper">
                              <img src="images/single-img-11.png" class="img-fluid border-rad_30" alt="single-img">
                           </div>
                           <div class="prt-descbox">
                              <div class="prt-desctext">
                                 <div class="prt-content-wrapper"><i class="flaticon-24-7"></i> 24/7 Support</div>  
                              </div>
                              <div class="prt-headingtext">
                                 <div class="prt-content-heading"><h4>Need advice? Book your free consultation</h4></div> 
                              </div>
                              <div class="prt-img-btn">
                                 <div class="prt-iocnbox-btn">
                                    <a href="tel:1234567890"><span>Call us: +123 (4567) 890</span></a>
                                 </div>  
                              </div>
                           </div>
                           
                        </div>
                     </div>
                     <div class="col-lg-8 col-md-12 faq-col res-991-mt-40">
                        <div class="accordion style2">
                           <!-- toggle -->
                           <div class="toggle prt-toggle_style_classic prt-control-right-true">
                              <div class="toggle-title"><a href="#" class=" active  ">How should I determine pricing for products/services?</a></div>
                              <div class="toggle-content show   " >
                                 <p>Determining pricing involves calculating production and overhead costs, analyzing market demand and competitor pricing, and aligning your strategy with customer value perceptions and regular review and adjustments ensure competitiveness and profitability in the market.</p>
                              </div>
                           </div><!-- toggle end -->
                           <!-- toggle -->
                           <div class="toggle prt-toggle_style_classic prt-control-right-true">
                              <div class="toggle-title"><a href="#" class="">Do I need a detailed business plan to start?</a></div>
                              <div class="toggle-content" style="display: none;">
                                 <p>A detailed business plan is crucial for outlining your goals, defining your business model, conducting market research, planning finances, and attracting investors and serves as a roadmap for startup success and growth.</p>
                              </div>
                           </div><!-- toggle end -->
                           <!-- toggle -->
                           <div class="toggle prt-toggle_style_classic prt-control-right-true">
                              <div class="toggle-title"><a href="#" class="">What are various effective marketing strategies for startups?</a></div>
                              <div class="toggle-content" style="display: none;">
                                 <p class="active">Effective marketing strategies for startups include digital marketing, content marketing, and influencer partnerships, networking at events, email campaigns, and customer referrals to build brand awareness and attract customers cost-effectively.</p>
                              </div>
                           </div><!-- toggle end -->
                           <!-- toggle -->
                           <div class="toggle prt-toggle_style_classic prt-control-right-true">
                              <div class="toggle-title"><a href="#" class="">What are the key metrics should I track for success?</a></div>
                              <div class="toggle-content" style="display: none;">
                                 <p class="active">Key metrics to track for startup success include revenue growth, customer acquisition cost (CAC), customer retention rate, gross and net profit margins, cash flow, and return on investment (ROI) from marketing and operational efforts.</p>
                              </div>
                           </div><!-- toggle end -->
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!--faq-section end-->
         </div>
         <?php include 'footer.php'; ?>