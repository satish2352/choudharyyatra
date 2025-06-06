<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <?php if(count($website_basic_structure)>0) { foreach($website_basic_structure as $key => $website_basic_structure_value) { ?>
    <title><?php echo $website_basic_structure_value['company_name']; ?></title>
    <?php } } ?>

    <!-- AOS LInks -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>uploads/do_not_delete/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="<?php echo base_url(); ?>assets/front/css/style.css" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="<?php echo base_url(); ?>assets/front/css/plugin.css" rel="stylesheet" type="text/css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/fonts/line-icons.css" type="text/css">
    

    <!--<script src="https://cdn.jsdelivr.net/npm/datalist-css/dist/datalist-css.min.js"></script>-->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BVZCZDH324"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BVZCZDH324');
</script>
<body>

    <!-- Preloader -->
    <!-- <div id="preloader">
        <div id="status"></div>
    </div> -->
    <!-- Preloader Ends -->

    <!-- header starts -->
    <header class="main_header_area">
        <div class="header-content py-1 bg-theme">
            <div class="container d-flex align-items-center justify-content-between">
                <?php if(count($website_basic_structure)>0) { foreach($website_basic_structure as $key => $website_basic_structure_value) { ?>
                <div class="links">
                    <ul>
                        <!-- <li><a href="#" class="white"><i class="icon-calendar white"></i> <?php //$tdate=date('M d, Y'); //echo date('l', strtotime($tdate)); ?>, <?php //echo $tdate; ?></a></li> -->
                        <li><a href="https://goo.gl/maps/mU5YbJmuEXqDoYpr7" class="white"><i class="icon-location-pin white"></i>  Nashik, Maharashtra</a></li>
                        <li><a href="tel:<?php echo $website_basic_structure_value['contact_number']; ?>" class="white"><i class="icon-phone white"></i>  +91&nbsp;<?php echo $website_basic_structure_value['contact_number']; ?></a></li>
                        <li><a href="#" class="white"><i class="icon-clock white"></i> Mon-Sun: 10 AM – 5 PM</a></li>
                    </ul>
                </div>
                <div class="links float-right">
                    <ul>  
                        <li><a href="<?php echo $website_basic_structure_value['facebook_link']; ?>" class="white" target="_blank"><i class="fab fa-facebook social_logo_head" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $website_basic_structure_value['instagram_link']; ?>" class="white" target="_blank"><i class="fab fa-instagram social_logo_head" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $website_basic_structure_value['twitter_link']; ?>" class="white" target="_blank"><i class="fab fa-youtube social_logo_head" aria-hidden="true"></i></a></li>
                        
                    </ul>
                </div>
                <?php } } ?>
            </div>
        </div>
        <!-- Navigation Bar -->
        <div class="header_menu" id="header_menu">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-2 pt-2">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="<?php echo base_url(); ?>home/index">
                                <img src="<?php echo base_url(); ?>uploads/do_not_delete/logo.png" alt="logo" width="230px;">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                <li><a href="<?php echo base_url(); ?>home/index">Home</a></li>
                                <li><a href="<?php echo base_url(); ?>about_us/index">About Us</a></li>
                                <li class="submenu dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tours <i class="icon-arrow-down" aria-hidden="true"></i></a> 
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url();?>packages/all_packages">Domestic Tours</a></li>
                                        <li><a href="<?php echo base_url();?>international_packages/all_packages">International Tours</a></li>
                                        <li><a href="<?php echo base_url();?>custom_domestic_booking_enquiry/all_custom_domestic_packages">Personalized Domestic Tours</a></li>
                                        <li><a href="<?php echo base_url();?>international_packages/all_custom_international_packages">Personalized International Tours</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url(); ?>gallery/index">Gallery</a></li>
								<li><a href="<?php echo base_url(); ?>award/index">Awards</a></li>
                                <li><a href="<?php echo base_url(); ?>agent_list/index">Agents List</a></li>
                                <li><a href="<?php echo base_url(); ?>contact_us">Contact Us</a></li>
                                <li><a href="<?php echo base_url(); ?>download/index">Download</a></li>
                        

                               
                               
                            </ul>
                            
                        </div>
                        

                        <div id="slicknav-mobile"></div>
                    </div>
                </div><!-- /.container-fluid --> 
            </nav>
        </div>
        <!-- Navigation Bar Ends -->
    </header>
    <!-- header ends -->