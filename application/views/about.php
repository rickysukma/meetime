<?php $this->load->view('frontend/head');
$this->load->view('frontend/menu')?>

<!-- <body class="boxed">
    <div class="wrapper"> -->
        <?php //$this->load->view('menu')?>
<!--         </div>
        <div class="jumbotron">
        </div> -->

<!--         <div class="main-content ">
            <div class="section">
                <div class="container">
                    <h2 class="section-heading"><?php echo $detail->title?></h2>
                    <p style="text-align: justify;"><?php echo $detail->description?></p>
                    <p>Info produk dan pemesanan,silahkan hubungi <?php echo $_SESSION['affNameAgent']; ?>
                        <?php
                        echo '<br>Nama Agen : '.$_SESSION['affNameAgent'];
                        echo '<br>Tlp : '.$_SESSION['affPhoneAgent'];
                        ?>
                    </p>
                </div>
            </div>
        </div> -->

    <section class="page-title" style="background-image:url(images/background/3.jpg)">
        <div class="auto-container">
            <h2><?php echo $detail->menu_name?></h2>
        </div>
    </section>
    <section class="blog-single-section">
        <div class="auto-container">
            <div class="inner-section">
                <!--Upper Box-->
                <div class="upper-box">
                    <ul class="post-meta">
                        <!-- <li><span class="icon flaticon-account"></span>By Admin</li>
                        <li><span class="icon flaticon-chat"></span>0 Comments</li> -->
                    </ul>
                    <h2><?php echo $detail->title?></h2>
                    <div class="text">
                        <?php echo $detail->description ?>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

<?php $this->load->view('frontend/footer')?>