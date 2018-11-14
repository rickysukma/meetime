<?php
    $this->load->view('frontend/head');
    $this->load->view('frontend/menu');
    $slideshow = $this->MSlideShow->getList();

?>
<!--Main Slider-->
    <section class="main-slider">
    	
        <div class="main-slider-carousel owl-carousel owl-theme">
            <!--  -->
            <?php foreach ($slideshow as $row) {
            ?>
            <div class="slide" style="background-image:url(<?php echo base_url('assets/images/slideshow/main/').$row->picture?>);height: 1920px;  height:450px;">
                <div class="auto-container">
                	<div class="content">
                    	<div class="title"><?php echo $row->description ?></div>
                    	<h2><?php echo $row->name ?></h2>
                    	<!-- <a href="#" class="theme-btn btn-style-one">About Company</a> -->
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
            <!--  -->
        </div>
    </section>
    <!--End Main Slider-s->
    
    <!--Blog Section-->
    <section class="blog-section">
    	<div class="auto-container">
        	<!--Sec Title-->
            <div class="sec-title">
            	<div class="icon-box">
                    <span class="icon flaticon-broom"></span>
                </div>
            	<h2>Artikel Terkini</h2>
                <div class="separator"></div>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme">
            
            	<?php
                    foreach ($result as $terkini) {
                        ?>
                        <!--News Block-->
                        <div class="news-block">
                            <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="image">
                                    <ul class="post-meta">
                                        <li><?php echo $terkini->category ?></li>
                                    </ul>
                                </div>
                                    <div class="image">
                                    <div class="post-date"><span><?php $tanggal = strtotime($terkini->post_date); echo date('d',$tanggal) ?></span><?php $bulan = date('m',$tanggal); $controller->bulan($bulan) ?><br></div>
                                    <a href="<?php echo site_url()?>news/detail/<?php echo $terkini->id?>"><img src="<?php echo site_url()?>/assets/images/news/thumbnail/<?php echo $terkini->picture;?>" alt="" /></a>
                                </div>
                                <div class="lower-content">
                                    <ul class="admin">
                                        <li><span class="icon flaticon-account"></span>By Admin</li>
                                    </ul>
                                    <h3><a href="<?php echo site_url()?>news/detail/<?php echo $terkini->id?>"><?php echo $terkini->title ?></a></h3>
                                    <a href="<?php echo site_url()?>news/detail/<?php echo $terkini->id?>" class="theme-btn read-btn">selengkapnya →</a>
                                </div>
                            </div>
                        </div>
                        <!--News Block-->   
                        <?
                    }
                ?>
                
                </div>
            </div>
        </div>
    </section>
    <!--End Blog Section-->

    <!--Pricing Section-->
    <section class="pricing-section">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <div class="icon-box">
                    <span class="icon flaticon-broom"></span>
                </div>
                <h2>Pricing Package</h2>
                <div class="separator"></div>
            </div>
            <div class="row clearfix">
                
                <!--Price Block-->
                <div class="price-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="icon-box">
                            <span class="icon flaticon-hotel"></span>
                        </div>
                        <h3>Residential</h3>
                        <div class="price"><sup>$</sup>49 <sub>/ Mo</sub></div>
                        <div class="lower-box">
                            <div class="text">* $5 Extra / Sq.ft <br> More than 2000 Sq.ft.</div>
                            <div class="link-box">
                                <a href="#" class="theme-btn book-btn">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Price Block-->
                <div class="price-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="icon-box">
                            <span class="icon flaticon-university"></span>
                        </div>
                        <h3>Commercial</h3>
                        <div class="price"><sup>$</sup>69 <sub>/ Mo</sub></div>
                        <div class="lower-box">
                            <div class="text">* $5 Extra / Sq.ft <br> More than 2000 Sq.ft.</div>
                            <div class="link-box">
                                <a href="#" class="theme-btn book-btn">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Price Block-->
                <div class="price-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="icon-box">
                            <span class="icon flaticon-hospital"></span>
                        </div>
                        <h3>Society</h3>
                        <div class="price"><sup>$</sup>99 <sub>/ Mo</sub></div>
                        <div class="lower-box">
                            <div class="text">* $5 Extra / Sq.ft <br> More than 2000 Sq.ft.</div>
                            <div class="link-box">
                                <a href="#" class="theme-btn book-btn">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Price Block-->
                <div class="price-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="icon-box">
                            <span class="icon flaticon-maintenance"></span>
                        </div>
                        <h3>MAintenance</h3>
                        <div class="price"><sup>$</sup>120 <sub>/ Mo</sub></div>
                        <div class="lower-box">
                            <div class="text">* $5 Extra / Sq.ft <br> More than 2000 Sq.ft.</div>
                            <div class="link-box">
                                <a href="#" class="theme-btn book-btn">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--End Pricing Section-->

    <!--Feedback Section-->
    <section class="feedback-section">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <div class="icon-box">
                    <span class="icon flaticon-broom"></span>
                </div>
                <h2>Customers Testimoni</h2>
                <div class="separator"></div>
            </div>
            
            <div class="feedback-carousel owl-carousel owl-theme">
                
                <!--Feedback Block-->
                <div class="feedback-block">
                    <div class="inner-box">
                        <div class="image">
                            <a href=""><img src="<?php echo base_url('assets/new-template/') ?>images/resource/feedback-1.jpg" alt="" /></a>
                        </div>
                        <div class="lower-content">
                            <div class="quote-icon">
                                <span class="icon flaticon-two-quotes"></span>
                            </div>
                            <h3><a href="carpet-cleaning.html">andrew Zachery</a></h3>
                            <div class="rating">
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                            </div>
                            <div class="text">“Exceptional! They did a wonder-ful job, and my home smelled so nice. Now I can't imagine being without them!”</div>
                        </div>
                    </div>
                </div>
                
                <!--Feedback Block-->
                <div class="feedback-block">
                    <div class="inner-box">
                        <div class="image">
                            <a href="carpet-cleaning.html"><img src="<?php echo base_url('assets/new-template/') ?>images/resource/feedback-2.jpg" alt="" /></a>
                        </div>
                        <div class="lower-content">
                            <div class="quote-icon">
                                <span class="icon flaticon-two-quotes"></span>
                            </div>
                            <h3><a href="carpet-cleaning.html">Liam gabriella</a></h3>
                            <div class="rating">
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                            </div>
                            <div class="text">“Exceptional! They did a wonder-ful job, and my home smelled so nice. Now I can't imagine being without them!”</div>
                        </div>
                    </div>
                </div>
                
                <!--Feedback Block-->
                <div class="feedback-block">
                    <div class="inner-box">
                        <div class="image">
                            <a href="carpet-cleaning.html"><img src="<?php echo(base_url('assets/new-template/')) ?>images/resource/feedback-3.jpg" alt="" /></a>
                        </div>
                        <div class="lower-content">
                            <div class="quote-icon">
                                <span class="icon flaticon-two-quotes"></span>
                            </div>
                            <h3><a href="carpet-cleaning.html">Michel Hunter</a></h3>
                            <div class="rating">
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                            </div>
                            <div class="text">“Exceptional! They did a wonder-ful job, and my home smelled so nice. Now I can't imagine being without them!”</div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </section>
    <!--End Feedback Section-->
<?php
    $this->load->view('frontend/footer');
?>