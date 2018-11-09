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
					<h2 class="section-heading">Berita Terbaru</h2>

					<?php if ($result):?>
						<?php foreach ($result as $row): ?>

							<div class="row featured-list">
								<div class="col-sm-4 ">
									<div class="featured-list-image"><img id="objectFit" class="lazyload" width="100%" data-original="<?php echo site_url()?>/assets/images/news/thumbnail/<?php echo $row->picture;?>" alt=""></div>
								</div>
								<div class="col-sm-8 ">
									<div class="featured-list-content">
										<h4 class="featured-list-content-title"><?php echo $row->title?></h4>
										<span id="moment" class="meta-date"><?php echo $row->post_date?></span>
										<p><?php echo word_limiter(strip_tags($row->description), 60)?></p><a href="<?php echo site_url()?>news/detail/<?php echo $row->id?>" class="btn btn-primary">Kunjungi &rarr;</a></div>
								</div>
							</div>

						<?php endforeach?>
					<?php endif?>
					
                </div>
            </div>
        </div>

<?php $this->load->view('footer')?>