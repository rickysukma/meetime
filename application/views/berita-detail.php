<?php $this->load->view('head')?>

<body class="boxed">
    <div class="wrapper">
        <?php $this->load->view('menu')?>
        </div>
        <div class="jumbotron">
        </div>

        <div class="main-content ">
            <div class="section">
                <div class="container">
					<?php if ($detail){?>
					<h2 class="section-heading"><?php echo $detail->title?></h2>
					<span id="moment" class="meta-date"><?php echo $detail->post_date?></span>
					<div class="post-featured-image"><img id="objectFit" class="lazyload loaded" data-original="<?php echo site_url()?>/assets/images/news/main/<?php echo $detail->picture; ?>" alt="<?php echo $detail->title?>" src="<?php echo site_url()?>/assets/images/news/main/<?php echo $detail->picture; ?>"></div>
					<p style="text-align: justify;"><?php echo $detail->description?></p>
					<?php } ?>
					<p>Info produk dan pemesanan,silahkan hubungi <?php echo $_SESSION['affNameAgent']; ?>
                        <?php
                        echo '<br>Nama Agen : '.$_SESSION['affNameAgent'];
                        echo '<br>Tlp : '.$_SESSION['affPhoneAgent'];
                        ?>
                    </p>
                </div>
            </div>
        </div>

<?php $this->load->view('footer')?>