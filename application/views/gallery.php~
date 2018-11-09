<?php $this->load->view('head')?>
<script src="<?php echo site_url()?>assets/javascripts/admin/jquery.js"></script>
<script src="<?php echo site_url()?>assets/javascripts/admin/jquery-1.8.3.min.js"></script>
<link href="<?php echo site_url()?>assets/javascripts/admin/fancybox/source/jquery.fancybox.css" rel="stylesheet" />

<body class="boxed">
    <div class="wrapper">
        <?php $this->load->view('menu')?>
        </div>
        <div class="jumbotron">
        </div>

        <div class="main-content ">
            <div class="section">
                <div class="container">
					<h2 class="section-heading">Gallery</h2>

                    <?php if ($result):?>
                        <?php foreach ($result as $row): ?>
                        <div class="col-sm-6 col-md-4 ">
							<a href="<?php echo site_url()."assets/images/gallery/main/".$row->picture?>" class="thumbnail fancybox">
							<img src="<?php echo site_url()."assets/images/gallery/thumbnail/".$row->picture?>" alt="Diskamtam Bandung">
							</a>
                        </div>
                        <?php endforeach?>
                    <?php endif?>
					
                </div>
            </div>
        </div>


<?php $this->load->view('footer')?>
<script type="text/javascript">
  $(function() {
	//    fancybox
	  jQuery(".fancybox").fancybox();
  });

</script>
<script src="<?php echo site_url()?>assets/javascripts/admin/fancybox/source/jquery.fancybox.js"></script>
