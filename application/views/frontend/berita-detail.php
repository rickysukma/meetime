<?php
    $this->load->view('frontend/head');
    $this->load->view('frontend/menu');
?>

<section class="page-title" style="background-image:url(images/background/3.jpg)">
        <div class="auto-container">
            <h2><?php echo $detail->title?></h2>
        </div>
    </section>
    <section class="blog-single-section">
        <div class="auto-container">
            <div class="inner-section">
                <!--Upper Box-->
                <div class="lower-box">
                    <ul class="post-meta">
                        <li><span class="icon flaticon-account"> </span>By Admin</li>
                        <li><span class="icon flaticon-date"> </span><?php $tanggal =  strtotime($detail->post_date); echo date('d-m-Y',$tanggal) ?></li>
                    </ul>
                    <h2><?php echo $detail->title?></h2>
                    <div class="text">
                        <?php echo $detail->description ?>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

<?php
	$this->load->view('frontend/footer');
 ?>