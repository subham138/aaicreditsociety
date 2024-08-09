<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Regional Provident Fund Co-Operative Credit Society Ltd</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
        
<!--        <link rel="stylesheet" href="<?= base_url() ?>/assets_menu/css/style.css">    -->
            
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font-awesome.css">
            
        <link rel="stylesheet" type="text/css" href="<?//= base_url() ?>assets/css/apps.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css_n/apps.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/apps_inner.css">
		
		
<link rel="stylesheet" href="<?= base_url() ?>assets/mobileMenu/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/mobileMenu/style.css">
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css_n/res.css">

<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
        
  <style>
.navMenuRes {float: left; width: 280px; border-top: 1px solid #999; border-right: 1px solid #999; border-left: 1px solid #999; margin-bottom: 15px;}
.navMenuRes li a {display: block; padding: 10px 15px; background: #ccc; border-top: 1px solid #eee; border-bottom: 1px solid #999; text-decoration: none; color: #000;}
.navMenuRes li a:hover, #nav li a.active {background: #999; color: #fff;}
.navMenuRes li ul {display: none;}
.navMenuRes li ul li a {padding: 10px 25px; background: #ececec; border-bottom: 1px dotted #ccc;}
</style>     
        
    </head>
    <body>
		
		

        <div class="bannerTop">
            <div class="wrapper bannerTopSub">
	            <div class="logoSec">
					<a href="/" title="Regional Provident Fund Co-Operative Credit Society Ltd" rel="home">
						<img src="<?= base_url() ?>assets/images/logo.png" alt=""/>
					</a>
				</div>
				
	            <div class="topNavSec navSec">
					<ul class="loginNav">
		<li><a href="tel:03339874188"><i class="fa fa-phone" aria-hidden="true"></i> 03339874188</a></li>
		<li><a href="mailto:info@aaicreditsociety@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i> aaicreditsociety@gmail.com </a></li>

		</ul>
<!--
                    <div class="whatsApp">
                        <i class="fa fa-phone-square" aria-hidden="true"></i>  (033) 2986-2096
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:rpfcoop2@gmail.com">rpfcoop2@gmail.com</a>
                    </div>
-->
                    
                    
            
                    <div class="navMenuAdmin">
                        <ul>
                            <?php if(array_key_exists('user', $_SESSION)){ 
								if(!is_array($_SESSION['user'])){ ?>
                                <li class="active"><a href="<?= site_url() ?>/login/admin">Admin Login</a></li>	         
                                <li><a href="<?= site_url() ?>/login">Member Login</a></li>
                            <?php }else{ ?>
							<?php if(array_key_exists('user_id', $_SESSION['user'])){ ?>
								<li><a href="<?= site_url() ?>/upload_csv" class="register">Upload CSV</a></li>
								<li><a href="<?= site_url() ?>/login/logout">Logout</a></li>
							<?php }else{ ?>
								<li><a href="<?= site_url() ?>/demand" class="register">Statement</a></li>
								<li><a href="<?= site_url() ?>/login/logout">Logout</a></li>
							<?php } ?>
                                
                            <?php }}else{ ?>
								<li class="active"><a href="<?= site_url() ?>/login/admin">Admin Login</a></li>	         
                                <li><a href="<?= site_url() ?>/login">Member Login</a></li>
							<?php } ?>
                        </ul>
                        	
                    </div>
<!--                    <div class="navMenu navMenuDestop">-->
<ul class="mainNav">
<li><a href="https://aaicreditsociety.com/" aria-current="page">Home</a></li>
<li><a href="#">About Us</a>

<ul class="dropdown">
<li><a href="https://aaicreditsociety.com/about-us/">About Us</a></li>
<li><a href="https://aaicreditsociety.com/about-us/chairmans-message/">Chairman’s Message</a></li>
<li><a href="https://aaicreditsociety.com/about-us/bod/">BOD</a></li>
<li><a href="https://aaicreditsociety.com/about-us/employees/">Employees</a></li>
</ul>
</li>
<li><a href="#">Services</a>

<ul class="dropdown">
<li><a href="https://aaicreditsociety.com/membership_deposits/">Membership & Deposits
</a></li>
<li><a href="https://aaicreditsociety.com/loans-advances/">Loans &amp; Advances</a></li>
</ul>
</li>

<li><a href="https://aaicreditsociety.com/photo-gallery/">Photo Gallery</a></li>
<li><a href="https://aaicreditsociety.com/downloads/">Downloads</a></li>
<li><a href="https://aaicreditsociety.com/contact-us/">Contact Us</a></li>
<li><a href="https://aaicreditsociety.com/notice/">Notice</a></li>
</ul>	
<!--                    </div>-->
					
					<div class="navSecMobile">
        <a class="open-menu btnResponsive" href="#" role="button" onClick="openFun()"><i class="fa fa-bars" aria-hidden="true"></i></a>
        
        <nav class="sidebar" id="sidebarId">
        
        <!-- close sidebar menu -->
        <div class="dismiss" onClick="closeFun()"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
        
        <div class="logoSidebar">
        <a href="/" title="AAIECCSL" rel="home"><img src="<?= base_url() ?>/assets/images/logo.png" alt=""></a>
        </div>
        
        
			
        <ul class="list-unstyled menu-elements">
        
        <li><a class="scroll-link" href="/"><i class="fa fa-caret-right" aria-hidden="true"></i>Home </a></li>
        <li>
        <a href="#otherSections" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections">
        <i class="fa fa-caret-right" aria-hidden="true"></i>
        About Us
        </a>
        <ul class="collapse list-unstyled" id="otherSections">
        <li><a class="scroll-link" href="https://aaicreditsociety.com/about-us/"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
        <li><a class="scroll-link" href="https://aaicreditsociety.com/about-us/from-the-ceo/"><i class="fa fa-caret-right" aria-hidden="true"></i>From The CEO</a></li>
        <li><a class="scroll-link" href="https://aaicreditsociety.com/about-us/achievements/"><i class="fa fa-caret-right" aria-hidden="true"></i>Achievements</a></li>

        <li><a class="scroll-link" href="https://aaicreditsociety.com/about-us/bod/"><i class="fa fa-caret-right" aria-hidden="true"></i>BOD</a></li>
		<li><a class="scroll-link" href="https://aaicreditsociety.com/about-us/employees/"><i class="fa fa-caret-right" aria-hidden="true"></i>Employees</a></li>
        </ul>
        </li>
        
        <li><a href="#otherSections2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections">
        <i class="fa fa-caret-right" aria-hidden="true"></i>Services</a>
        <ul class="collapse list-unstyled" id="otherSections2">
        
			
		<li><a class="scroll-link" href="https://aaicreditsociety.com/membership_deposits/"><i class="fa fa-caret-right" aria-hidden="true"></i>Membership & Deposits
</a></li>
			
<!--        <li><a class="scroll-link" href="https://aaicreditsociety.com/deposits/"><i class="fa fa-caret-right" aria-hidden="true"></i>Deposits</a></li>-->
        <li><a class="scroll-link" href="https://aaicreditsociety.com/loans-advances/"><i class="fa fa-caret-right" aria-hidden="true"></i>Loans &amp; Advances</a></li>
        </ul>
        </li>
        
      
        <li><a class="scroll-link" href="https://aaicreditsociety.com/photo-gallery/"><i class="fa fa-caret-right" aria-hidden="true"></i>Photo Gallery</a></li>
        <li><a class="scroll-link" href="https://aaicreditsociety.com/contact-us/"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>
        <li><a class="scroll-link" href="https://aaicreditsociety.com/downloads/"><i class="fa fa-caret-right" aria-hidden="true"></i>Downloads</a></li>
		<li><a class="scroll-link" href="https://aaicreditsociety.com/notice/"><i class="fa fa-caret-right" aria-hidden="true"></i>Notice</a></li>	
       </ul>
        
		<ul class="admin_Nav">
		<li><a href="https://aaicreditsociety.com/process/index.php/login/admin">Admin Login</a></li>	         
		<li><a href="https://aaicreditsociety.com/process/index.php/login">Member Login</a></li>
		</ul>
        
        </nav>

        </div>
                </div>
                <br clear="all">
            </div>
            <!--<marquee class="marqueeCls" direction = "right"><h3 class="blinkTxt"><a href="https://rpfcoop2.com/wp-content/uploads/2021/11/REWARD.pdf" target="_blank" rel="noopener">Reward to Meritorious Students”, Year: 2021 [Last Date of Form Submission : 17/12/2021]</a></h3></marquee>-->
	</div>
        </div>
	
        <div class="bannerSecInner">
            <div class="wrapper">
                <div class="col-sm-12">
                    <h1><?= $title; ?></h1>
                </div>
            </div>
        </div>