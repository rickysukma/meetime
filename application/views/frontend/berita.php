<?php
    $this->load->view('frontend/head');
    $this->load->view('frontend/menu');
?>

	 <!--Blog Page Container-->
    <section class="blog-page-section">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--News Block-->
                		<?php
                	        foreach ($result as $terkini) {
                	            ?>
                	            <!--News Block-->
                	            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                	                <div class="inner-box">
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
            
            <!--Styled Pagination-->
            <ul class="styled-pagination text-center">
            	<li class="prev"><a href="#"><span class="fa fa-angle-left"></span></a></li>
                <li><a href="#">1</a></li>
                <li><a href="#" class="active">2</a></li>
                <li><a href="#">3</a></li>
                <li class="next"><a href="#"><span class="fa fa-angle-right"></span></a></li>
            </ul>                
            <!--End Styled Pagination-->
            
        </div>
    </section>
    <!--End Faq Page Section-->


<?php $this->load->view('frontend/footer') ?>