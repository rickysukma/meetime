<!--Main Footer-->
    <footer class="main-footer">
		<div class="footer-upper-box">
        	<div class="auto-container">
            	<div class="clearfix">
                	
                    <!--Expert Box-->
                    
                </div>
            </div>
        </div>
        <!--Widgets Section-->
        <div class="widgets-section">
        	<div class="auto-container">
                <div class="row clearfix">
                    
                    <!--big column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
                        
                            <!--Footer Column-->
                            <div class="footer-column col-md-7 col-sm-6">
                                <div class="footer-widget we-are-widget">
                                	<h2><?php echo $this->MGeneral->getNameByCode('NAME')?></h2>
                                    <div class="text"><?php echo $this->MGeneral->getNameByCode('DESCR')?></div>
                                    <!-- <a href="#" class="read-more">read more</a> -->
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                            
                        </div>
                    </div>
                    
                    <!--big column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
                        	
                            <!--Footer Column-->
                            <div class="footer-column col-md-6 col-sm-6">
                                <div class="footer-widget links-widget">
                                	<h2>Informasi</h2>
                                    <ul class="footer-links">
                                    	<?php $menuBottom = $this->MPages->getListBottom();?>
                                    <?php if ($menuBottom){?>
                                        <?php foreach ($menuBottom as $dataBottom){?>
                                            <li><a href="<?php echo site_url()?>page/index/<?php echo $dataBottom->id;?>"><?php echo $dataBottom->menu_name;?></a></li>
                                        <?php } ?>  
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
							
							<!--Footer Column-->
                            <div class="footer-column col-md-6 col-sm-6">
                                <div class="footer-widget links-widget">
                                	<h2 class="alternate"><?php echo $this->MGeneral->getNameByCode('TELP')?></h2>
									<ul class="contact-list">
										<li><?php echo $this->MGeneral->getNameByCode('EMAIL')?></li>
										<li><?php echo $this->MGeneral->getNameByCode('ALMT')?></li>
									</ul>
									<ul class="social-icon-one">
										<li><a href="<?php echo $this->MGeneral->getNameByCode('FB')?>"><span class="fa fa-facebook-f"></span></a></li>
										<li><a href="<?php echo $this->MGeneral->getNameByCode('TW')?>"><span class="fa fa-twitter"></span></a></li>
									</ul>
								</div>
                            </div>
							
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
		
		<!--Footer Bottom-->
		<div class="footer-bottom">
        	
			<div class="auto-container">
				<div class="clearfix">
					
					<div class="logo-box">
						<a href=""><img src="images/footer-logo.png" alt="" /></a>
					</div>
					
					<div class="pull-left">
						<div class="copyright"> &copy; <?php echo date('Y') ?> All rights reserved by <?php echo $this->MGeneral->getNameByCode('NAME')?>, <br> Certified cleaning company.</div>
					</div>
					<div class="pull-right">
						<!--Scroll to top-->
			<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-next-5"></span></div>
					</div>
					
				</div>
			</div>
		</div>
	</footer>
</div>
<!--End pagewrapper-->

<script src="<?php echo base_url('assets')?>/new-template/js/jquery.js"></script>
<script src="<?php echo base_url('assets')?>/new-template/js/popper.min.js"></script>
<script src="<?php echo base_url('assets')?>/new-template/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets')?>/new-template/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url('assets')?>/new-template/js/jquery.fancybox.js"></script>
<script src="<?php echo base_url('assets')?>/new-template/js/appear.js"></script>
<script src="<?php echo base_url('assets')?>/new-template/js/owl.js"></script>
<script src="<?php echo base_url('assets')?>/new-template/js/wow.js"></script>
<script src="<?php echo base_url('assets')?>/new-template/js/jquery-ui.js"></script>
<script src="<?php echo base_url('assets')?>/new-template/js/script.js"></script>

<!-- <script type="text/javascript">
    $("#home").click(function() {
    $('html,body').animate({
        scrollTop: $("#div-home").offset().top},
        'slow');
});

$("#testimoni").click(function() {
    $('html,body').animate({
        scrollTop: $("#div-testimoni").offset().top},
        'slow');
});
</script> -->

</body>
</html>