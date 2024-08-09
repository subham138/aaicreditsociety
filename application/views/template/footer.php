       

<div class="footerBlue">
<div class="wrapper">
<div class="col-sm-8 float-left footerLeft">
<h2>More Links</h2>
<ul id="menu-footer-link" class="menu"><li id="menu-item-298" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-298"><a href="https://aaicreditsociety.com/">Home</a></li>
<li id="menu-item-303" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-303"><a href="https://aaicreditsociety.com/services/">Services</a></li>
<li id="menu-item-302" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-302"><a href="https://aaicreditsociety.com/photo-gallery/">Photo Gallery</a></li>
<li id="menu-item-299" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-292 current_page_item menu-item-299"><a href="https://aaicreditsociety.com/contact-us/" aria-current="page">Contact Us</a></li>
<li id="menu-item-301" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-301"><a href="https://aaicreditsociety.com/notice/">Notice</a></li>
</ul><!--<ul>
<li><a href="#">About</a></li>
<li><a href="#">Publication & Reports</a></li>
<li><a href="#">Events</a></li>
<li><a href="#">Tenders</a></li>
<li><a href="#">Department</a></li>
<li><a href="#">Society's Corner</a></li>
<li><a href="#">Notice</a></li>
<li><a href="#">Contact</a></li>
</ul>-->
</div>
<div class="col-sm-4 float-left footerRight">
<h2>Get in Touch</h2>
<ul class="address">
<li class="addresList">NSCBI Airport, P.O.+P.S.-Kolkata Airport,Kolkata-700052.</li>
<li class="emailList"><a href="mailto:aaicreditsociety@gmail.com">aaicreditsociety@gmail.com</a></li>
<li class="phonList">03339874188</li>
</ul>
<p class="follow"> <span>Follow us at:</span>   <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></p>
</div>
</div>
</div>

<div class="footerWhite">Copyright © 2024 Airport Authority of India. All rights reserved.<br>
Design &amp;  Developed by <a href="https://synergicsoftek.in/" target="_blank">Synergic Softek Solutions Pvt. Ltd.</a> </div>






        
        
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>-->
<?php /*?><script src="<?= base_url() ?>/assets_menu/js/scripts.js"></script><?php */?>


<script src="<?= base_url() ?>/assets/mobileMenu/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
-->

        
<!--        <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>-->
        <!-- <script src="<?= base_url() ?>assets/js/javascript.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.js"></script> -->
<!--
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
-->
<script>
$(document).ready(function () {
  $('#nav > li > a').click(function(e){
     if ($(this).attr('class') != 'active'){
       $('#nav li ul').slideUp();
	   $(this).next().slideToggle();
	   $('#nav li a').removeClass('active');
	   $(this).addClass('active');
	 }
	 e.preventDefault();
  });
});
</script>
    </body>
</html>