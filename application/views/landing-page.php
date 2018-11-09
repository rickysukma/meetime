<?php $this->load->view('head')?>

<body class="boxed">
    <div class="wrapper">
        <?php $this->load->view('menu')?>
        </div>
        <div class="jumbotron">
        </div>

<?php $slideshow = $this->MSlideShow->getList()?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php $i = 0;$act = 'active'; if ($slideshow){?>
        <?php foreach ($slideshow as $row){?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="<?php echo $act;?>"></li>
        <?php $act = '';$i++;} ?>	
    <?php } ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" style="width:100%; max-height: 500px !important;">
    <?php $act = 'active'; if ($slideshow){?>
        <?php foreach ($slideshow as $row){?>
            <div class="item <?php echo $act;?>">
            <img style="width:100%;" src="<?php echo site_url().'assets/images/slideshow/main/'.$row->picture;?>" alt="<?php echo $row->name?>">
            <div class="carousel-caption">
                <h3><?php echo $row->name?></h3>
                <p><?php echo $row->description?></p>
            </div>
            </div>
        <?php $act = '';} ?>	
    <?php } ?>
  </div>
</div>
        <div class="main-content ">
            <div class="section">
                <div class="container">
                    <h2 class="section-heading">Artikel Terkini</h2>
                    <div class="row">

                    <?php if ($result):?>
                        <?php foreach ($result as $row): ?>
                        <div class="col-sm-6 col-md-4 ">
                            <div class="card card-post">
                                <div class="card-image  card-image-md ">
                                    <a href="<?php echo site_url()?>/news/detail/<?php echo $row->id?>" title="Perbaikan Bendera di Tugu Jam Simpang Empat Asia Afrika"><img id="objectFit" class="lazyload" data-original="<?php echo site_url()?>/assets/images/news/thumbnail/<?php echo $row->picture;?>" alt="Perbaikan Bendera di Tugu Jam Simpang Empat Asia Afrika" /></a>
                                </div>
                                <div class="card-block">
                                    <span id="moment" class="card-posted">
                    <?php echo $row->post_date;?>
                </span>
                                    <a href="<?php echo site_url()?>/news/detail/<?php echo $row->id?>" title="Perbaikan Bendera di Tugu Jam Simpang Empat Asia Afrika"><h4 class="card-title"><?php echo $row->title;?></h4></a>
                                                                                <p class="card-text"><?php echo word_limiter(strip_tags($row->description), 10);?></p></div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                        <?php endforeach?>
                    <?php endif?>

                    </div>
                </div>
            </div>
            <?php $aboutPage = $this->MPages->getAboutPage();?>
            <?php if ($aboutPage){?>
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-sm-push-8"></div>
                        <div class="col-sm-8 col-sm-pull-4">
                            <br/>
                            <h2><?php echo $aboutPage->title?>.</h2>
                            <p>
                                <?php echo word_limiter(strip_tags($aboutPage->description), 60);?>
                            </p>
                            <p><a href="<?php echo site_url()?>page/index/<?php echo $aboutPage->id;?>">selengkapnya &rarr;</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

<?php $this->load->view('footer')?>