<?php
$current_page = basename($_SERVER['SCRIPT_NAME'], '.php');

// Define SEO metadata for all dynamic pages – Web Development Company
$seo_data = [
  'index' => [
    'title' => 'Home | Nexbytech - Web Development Company',
    'description' => 'Nexbytech is a professional web development company. We build custom websites, web apps, and provide design, development, and maintenance services.',
    'keywords' => 'web development company, custom website development, web design, PHP, responsive websites, Nexbytech'
  ],
  'about-us' => [
    'title' => 'About Us | Nexbytech - Web Development Company',
    'description' => 'Learn about Nexbytech. We are a web development company leading with technology and delivering with trust. Our mission and vision for your digital success.',
    'keywords' => 'about Nexbytech, web development company, web design team, custom development'
  ],
  'contact-us' => [
    'title' => 'Contact Us | Nexbytech - Get a Quote',
    'description' => 'Contact Nexbytech for your web development and design projects. Get a free quote and start your website or web application today.',
    'keywords' => 'contact Nexbytech, web development quote, get in touch, project inquiry'
  ],
  'service' => [
    'title' => 'Our Services | Web Development & Design | Nexbytech',
    'description' => 'Web development, website design, Education CRM, ERP solutions, Android apps, and website maintenance. Full-service web development company.',
    'keywords' => 'web development services, website design, custom web apps, CRM, ERP, maintenance'
  ],
  // Generic service details (fallback)
  'service-details' => [
    'title' => 'Service Details | Nexbytech Web Development',
    'description' => 'Detailed information about our web development and design services. Custom websites, web applications, and ongoing support.',
    'keywords' => 'web development, website design details, custom development, service overview'
  ],
  // Individual service details
  'service-web-development' => [
    'title' => 'Web Development Services | Nexbytech',
    'description' => 'Custom web development services including business websites, web applications, and e-commerce solutions built with clean, scalable code.',
    'keywords' => 'web development services, custom web apps, business websites, PHP development'
  ],
  'service-website-design' => [
    'title' => 'Website Design Services | Nexbytech',
    'description' => 'Professional website design services focused on clean layouts, strong visuals, and user-friendly experiences for your brand.',
    'keywords' => 'website design, UI UX design, responsive design, web design agency'
  ],
  'service-education-crm' => [
    'title' => 'Education CRM Solutions | Nexbytech',
    'description' => 'Education CRM development for schools, colleges, and training institutes to manage leads, admissions, students, and communication.',
    'keywords' => 'education CRM, student management system, admissions CRM, school CRM'
  ],
  'service-erp-solutions' => [
    'title' => 'ERP Solutions | Nexbytech',
    'description' => 'Web-based ERP solutions that centralize operations like inventory, sales, HR, and finance into one integrated platform.',
    'keywords' => 'ERP solutions, web ERP, business management system, enterprise software'
  ],
  'service-android-development' => [
    'title' => 'Android App Development | Nexbytech',
    'description' => 'Custom Android app development services to extend your product or service to mobile users with performant native or cross-platform apps.',
    'keywords' => 'Android app development, mobile app development, Android apps'
  ],
  'service-website-maintenance' => [
    'title' => 'Website Maintenance Services | Nexbytech',
    'description' => 'Ongoing website maintenance including updates, backups, monitoring, and small changes to keep your site secure and up to date.',
    'keywords' => 'website maintenance, website support, site updates, site monitoring'
  ],
  'team' => [
    'title' => 'Our Team | Web Developers & Designers | Nexbytech',
    'description' => 'Meet the web developers and designers behind Nexbytech. We deliver modern, scalable websites and web applications.',
    'keywords' => 'Nexbytech team, web developers, designers, development team'
  ],
  'faq' => [
    'title' => 'FAQ | Web Development Questions | Nexbytech',
    'description' => 'Frequently asked questions about our web development services, pricing, timelines, and how we work with clients.',
    'keywords' => 'FAQ, web development questions, pricing, project process'
  ],
  'pricing' => [
    'title' => 'Pricing | Web Development Plans | Nexbytech',
    'description' => 'Transparent pricing for web development and design. Choose a plan that fits your business—from basic sites to full web applications.',
    'keywords' => 'web development pricing, website cost, development plans, Nexbytech'
  ],
  'portfolio' => [
    'title' => 'Our Work | Web Development Portfolio | Nexbytech',
    'description' => 'Browse our web development portfolio. Websites, web applications, and digital projects we have delivered for clients.',
    'keywords' => 'Nexbytech portfolio, web development projects, website examples, case studies'
  ],
  'blog' => [
    'title' => 'Blog | Web Development & Design Insights | Nexbytech',
    'description' => 'Tips, trends, and insights on web development, design, and digital strategy from the Nexbytech team.',
    'keywords' => 'web development blog, design tips, development insights, Nexbytech'
  ]
];

// Fallback logic if the page is not explicitly in the array
$page_title = isset($seo_data[$current_page]) ? $seo_data[$current_page]['title'] : (ucfirst(str_replace('-', ' ', $current_page)) . ' | Nexbytech - Web Development Company');
$page_desc = isset($seo_data[$current_page]) ? $seo_data[$current_page]['description'] : 'Nexbytech - Professional Web Development Company. Custom websites, web apps, and design.';
$page_keywords = isset($seo_data[$current_page]) ? $seo_data[$current_page]['keywords'] : 'web development company, custom websites, web design, Nexbytech';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="<?= htmlspecialchars($page_keywords) ?>">
  <meta name="description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($page_title) ?></title>
  <link rel="shortcut icon" href="images/favicon.png">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/swiper-bundle.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/flaticon_inqord.css">
  <link rel="stylesheet" type="text/css" href="css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="css/fontello.css">
  <link rel="stylesheet" type="text/css" href="css/aos.css">
  <link rel="stylesheet" type="text/css" href="css/wow.css">
  <link rel="stylesheet" type="text/css" href="css/slick.css">
  <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
  <link rel="stylesheet" type="text/css" href="css/shortcodes.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/megamenu.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>

<body>
  <!-- Popup Overlay -->
  <div class="quotation--popup-overly"></div>
  <!-- Popup Container -->
  <div class="quotation--popup-extra-header" id="quotation--popup">
    <div class="modal-content">
      <div class="container">
        <div class="row">
          <!-- Left Side -->
          <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
            <div class="prt-newslettercontent">
              <h3 class="prt-pop-quotationform-title">Complete the form and we’ll get back to you soon.</h3>
              <p class="prt-pop-quotationform-details">
                Send us the completed form, and our team will reach out to you as soon as possible.
              </p>
            </div>
          </div>
          <!-- Right Side Form -->
          <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
            <div class="popup-right">
              <form id="quotationForm">
                <!-- Step 1 -->
                <div class="form-step active">
                  <div class="row">
                    <div class="col-lg-12">
                      <p> <label for="firstName">Your name *</label>
                        <input type="text" id="firstName" name="firstName" placeholder="Your name" required>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p> <label for="email">Your email *</label>
                        <input type="email" id="email" name="email" placeholder="Your email address" required>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p> <label for="lastName">Your last*</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Last name" required>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p> <label for="companyName">Company name</label>
                        <input type="text" id="companyName" name="companyName" placeholder="Your company " required>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p> <label for="your-number">Your number*</label>
                        <input type="number" id="your-number" name="your-number" placeholder="Your number" required>
                      </p>
                    </div>
                  </div>
                  <p> <button type="button" class="next-btn">Next</button> </p>
                </div>
                <!-- Step 2 -->
                <div class="form-step">
                  <div class="row">
                    <div class="col-lg-12">
                      <p>
                        <label for="WebsiteName">Current website URL (if applicable)</label>
                        <input type="text" id="WebsiteName" name="WebsiteName" placeholder="Website name" required>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="project-start-time">Project start time</label>
                        <select id="project-start-time" name="projectStartTime">
                          <option disabled selected>Site Completion deadline*</option>
                          <option value="Immediately">Immediately</option>
                          <option value="1-3 months">1-3 months</option>
                          <option value="Later">Later</option>
                        </select>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="services-required">Services required</label>
                        <select id="services-required" name="servicesRequired">
                          <option value="web-development">Web Development</option>
                          <option value="website-design" selected>Website Design</option>
                          <option value="education-crm">Education CRM</option>
                          <option value="erp-solutions">ERP Solutions</option>
                          <option value="android-development">Android Development</option>
                          <option value="website-maintenance">Website Maintenance</option>
                        </select>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="itemsName">Create items for your navigation bar</label>
                        <input type="text" id="itemsName" name="itemsName" placeholder="Your items" required>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="budget">What is your budget?</label>
                        <select id="budget" name="budget">
                          <option>select your budget?</option>
                          <option>Under $50,000</option>
                          <option selected>$50k-$100k</option>
                          <option>$100k-$200k</option>
                          <option>Above $200k</option>
                        </select>
                      </p>
                    </div>
                  </div>
                  <p>
                    <button type="button" class="prev-btn">Previous</button>
                    <button type="button" class="next-btn ml-10">Next</button>
                  </p>
                </div>
                <!-- Step 3 -->
                <div class="form-step">
                  <p> <label for="your-message">Additional comments</label>
                    <textarea id="your-message" name="your-message" cols="50" rows="5" maxlength="2000"
                      placeholder="Anything else we should know?"></textarea>
                  </p>
                  <p>
                    <button type="button" class="prev-btn">Previous</button>
                    <button type="submit" class="ml-10">Submit</button>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Close Button -->
      <span class="close-btn" id="closePopup"
        style="position: absolute; top: 10px; right: 20px; font-size: 28px; cursor: pointer;">&times;</span>
    </div>
  </div>
  <!--page-start-->
  <div class="page">
    <div class="min-box">
      <!-- header start -->
      <header id="masthead" class="header prt-header-style-01">
        <!-- topbar -->
        <div class="top_bar prt-topbar-wrapper text-base-white clearfix">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex flex-row align-items-center justify-content-start top_bar_border">
                  <div class="top_bar_contact_item">
                    <div class="top_bar_icon"><i class="flaticon-mail"></i>
                    </div>
                    <a href="mailto:info@nexbytech.com">info@nexbytech.com</a>
                  </div>
                  <div class="top_bar_contact_item">
                    <div class="top_bar_icon"><i class="ti-location-pin"></i>
                    </div>
                    Your City, Your State
                  </div>
                  <div class="top_bar_contact_item">
                    <div class="top_bar_icon"><i class="flaticon-phone-call">
                      </i>
                    </div>
                    <a href="tel:1234567890">+1 (002) 123-4567</a>
                  </div>
                  <div class="top_bar_contact_item top_bar_social ms-auto">
                    <ul class="social-icons">
                      <li><a href="#" rel="noopener" aria-label="facebook">
                          <i class="flaticon-facebook"></i></a>
                      </li>
                      <li><a href="#" rel="noopener" aria-label="twitter">
                          <i class="flaticon-instagram"></i></a>
                      </li>
                      <li><a href="#" rel="noopener" aria-label="pinterest">
                          <i class="flaticon-twitter"></i></a>
                      </li>
                      <li><a href="#" rel="noopener" aria-label="linkedin">
                          <i class="ti-pinterest"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- topbar end -->
        <!-- site-header-menu -->
        <div id="site-header-menu" class="site-header-menu prt-bgcolor-white">
          <div class="site-header-menu-inner prt-stickable-header">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-lg-12">
                  <!--site-navigation -->
                  <div class="site-navigation d-flex flex-row">
                    <!-- site-branding -->
                    <div class="site-branding me-auto">
                      <a class="home-link" href="index" title="Nexbytech" rel="home">
                        <img id="logo-img" class="img-center" src="images/logo_demo1.svg" alt="logo-img">
                      </a>
                    </div>
                    <!-- site-branding end -->
                    <div class="btn-show-menu-mobile menubar menubar--squeeze">
                      <span class="menubar-box">
                        <span class="menubar-inner"></span>
                      </span>
                    </div>
                    <!-- menu -->

                    <nav class="main-menu menu-mobile" id="menu">
                      <ul class="menu">
                        <li>
                          <a class="mega-menu-link <?= ($current_page == 'index') ? 'active' : '' ?>"
                            href="index">Home</a>
                        </li>
                        <li>
                          <a class="mega-menu-link <?= ($current_page == 'about-us') ? 'active' : '' ?>"
                            href="about-us">About Us</a>
                        </li>
                        <li class="<?= ($current_page == 'service') ? 'active' : '' ?>">
                          <a class="mega-menu-link <?= ($current_page == 'service') ? 'active' : '' ?>"
                            href="service">Services</a>
                        </li>
                        <li class="<?= ($current_page == 'pricing') ? 'active' : '' ?>">
                          <a class="mega-menu-link <?= ($current_page == 'pricing') ? 'active' : '' ?>"
                            href="pricing">Pricing</a>
                        </li>
                        <li class="<?= ($current_page == 'faq') ? 'active' : '' ?>">
                          <a class="mega-menu-link <?= ($current_page == 'faq') ? 'active' : '' ?>"
                            href="faq">FAQ</a>
                        </li>
                        <li class="<?= ($current_page == 'blog' || $current_page == 'blog-grid' || $current_page == 'blog-grid-col-2' || $current_page == 'blog-grid-col-3' || $current_page == 'blog-details') ? 'active' : '' ?>">
                          <a class="mega-menu-link <?= ($current_page == 'blog' || $current_page == 'blog-grid' || $current_page == 'blog-grid-col-2' || $current_page == 'blog-grid-col-3' || $current_page == 'blog-details') ? 'active' : '' ?>"
                            href="blog">Blog</a>
                        </li>
                        <li class="<?= ($current_page == 'contact-us') ? 'active' : '' ?>">
                          <a class="mega-menu-link <?= ($current_page == 'contact-us') ? 'active' : '' ?>"
                            href="contact-us">Contact Us</a>
                        </li>
                      </ul>
                    </nav>
                    <!-- HEADER BUTTON -->
                    <div class="header_extra d-flex flex-row align-items-center justify-content-end">
                      <div class="header_btn">
                        <a class="prt-btn" href="#" id="openQuotation">Get a Quote</a>
                      </div>
                    </div>
                  </div>
                  <!-- site-navigation end-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- site-header-menu end-->
      </header>
      <!-- header end -->