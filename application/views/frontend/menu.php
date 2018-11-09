    <!-- Main Header-->
    <header class="main-header">
    
    	<!--Header Top-->
    	<div class="header-top">
            <div class="auto-container">
                <div class="clearfix">
                    <!--Top Left-->
                    <div class="top-left pull-left">
                    	
                        <ul class="social-nav">
                        	<li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                        </ul>
                    </div>
                    <!--Top Right-->
                    <div class="top-right pull-right">
                    	<!--Search Box-->
                        <div class="search-box-outer">
                            <button class="search-box-btn dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                            <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu1">
                                <li class="panel-outer">
                                    <div class="form-container">
                                        <form method="get" action="">
                                            <div class="form-group">
                                                <input type="search" name="q" placeholder="Cari artikel" required>
                                                <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    
    	<!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="clearfix">
                    
                    <div class="pull-right upper-right clearfix">
                    	
                        <!--Info Box-->
                        <div class="upper-column info-box">
                        	<!-- <div class="icon-box"><span class="flaticon-clock"></span></div> -->
                            <!-- <ul>
                            	<li><span>Office Opened</span> <br>Mon-Sat Day: 9am to 7pm </li>
                            </ul> -->
                            
                        </div>
                        <div class="upper-column info-box">
                            <!-- <ul>
                            	<li><span>75014 Paris, France</span> <br> 48 Boulevard Jourdan Cand  </li>
                            </ul> -->
                            
                        </div>
                        
                        <!--Info Box-->
                        <div class="upper-column info-box">
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <!--End Header Upper-->
        
        <!--Header Lower-->
        <div class="header-lower">
            
        	<div class="auto-container">
            	<div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <?php $menuTop = $this->MPages->getListTop();?>
                                <li class=""><a href="<?php echo site_url()?>">Home</a></li>
                                <li class=""><a href="<?php echo site_url('news')?>">Berita</a></li>
                        <?php if ($menuTop){?>
                            <?php foreach ($menuTop as $dataTop){?>
                                <li class=""><a href="<?php echo site_url()?>page/index/<?php echo $dataTop->id;?>"><?php echo $dataTop->menu_name;?></a></li>
                            <?php } ?>  
                        <?php } ?>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                    <div class="outer-box clearfix">
                    	<div class="phone-number">
                        	<div class="icon-outer">
                        		<span class="icon fa fa-phone"></span>
                            </div>
                        	<span class="theme_color">Telepon:</span> <?php echo $this->MGeneral->getNameByCode('TELP')?>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Lower-->
        
        <!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container clearfix">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<a href="" class="img-responsive"><img src="images/logo-small.png" alt="" title=""></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                	<!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix">
                                <?php $menuTop = $this->MPages->getListTop();?>
                                <li class=""><a href="<?php echo site_url()?>">Home</a></li>
                                <li class="<?php echo ($this->uri->segment(1) == 'news' ? 'current' : '')?>"><a href="<?php echo site_url('news')?>">Berita</a></li>
                                <?php if ($menuTop){?>
                                    <?php foreach ($menuTop as $dataTop){?>
                                        <li class="<?php echo ($this->uri->segment(3) == $dataTop->id ? 'current' : '')?>"><a href="<?php echo site_url()?>page/index/<?php echo $dataTop->id;?>"><?php echo $dataTop->menu_name;?></a></li>
                                    <?php } ?>  
                                <?php } ?> 
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
    
    </header>
    <!--End Main Header -->