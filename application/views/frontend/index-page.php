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
<?php
    $this->load->view('frontend/footer');
?>