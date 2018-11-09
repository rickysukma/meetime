<?php $this->load->view('header')?>
    <div class="main-title" style="background-color: #f2f2f2">
        <div class="container">
            <h1 class="main-title__primary"><?php echo $detail->title?></h1>
            <h3 class="main-title__secondary">THIS IS <?php echo strtoupper($detail->title)?></h3>
        </div>
    </div>
    <div class="breadcrumbs ">
        <div class="container">
            <span typeof="v:Breadcrumb"><a title="Go to Home." href="index.html" class="home">Home</a></span>
            <span typeof="v:Breadcrumb"><span><?php echo $detail->title?></span></span>    
        </div>
    </div>
    <div class="master-container">
        <div class="container">
            <div class="row">
                <main class="col-xs-12" role="main">
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo $detail->description?>
                        </div>
                        
                    </div>
                </main>
            </div>
        </div><!-- /container -->
    </div>
      
<?php $this->load->view('footer')?>