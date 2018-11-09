        <div class="navbar navbar-transparent">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo site_url()?>"></a>
                </div>
                <ul class="nav navbar-nav navbar-right navbar-menu-icon hidden-md hidden-lg">
                    <li><a href="#" class="nav-trigger no-border-content"><em aria-hidden="true"></em></a></li>
                </ul>
                <nav class="main-menu">
                    <ul class="nav navbar-nav navbar-right navbar-search">
                        <li class="search">
                            <form method="GET" action="" role="search">
                                <div class="search-input">
                                    <input type="search" name="q" placeholder="Cari artikel ..." required title="Pencarian artikel terkait">
                                    <button type="submit"><span class="fa fa-search"></span></button>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <?php $menuTop = $this->MPages->getListTop();?>
                        <li class=""><a href="<?php echo site_url()?>">Home</a></li>
                        <?php if ($menuTop){?>
                            <?php foreach ($menuTop as $dataTop){?>
                                <li class="<?php echo ($this->uri->segment(3) == $dataTop->id ? 'active' : '')?>"><a href="<?php echo site_url()?>page/index/<?php echo $dataTop->id;?>"><?php echo $dataTop->menu_name;?></a></li>
                            <?php } ?>	
                        <?php } ?>                        
                        <!--<li class="<?php echo ($this->uri->segment(1) == 'map' ? 'active' : '')?>"><a href="<?php echo site_url()?>map">Lokasi Makam dan Taman</a></li>
                        <li class="<?php echo ($this->uri->segment(1) == 'gallery' ? 'active' : '')?>"><a href="<?php echo site_url()?>gallery">Gallery</a></li>
                        <li class="<?php echo ($this->uri->segment(1) == 'download' ? 'active' : '')?>"><a href="<?php echo site_url()?>download">Unduh</a></li>
                        <li class="<?php echo ($this->uri->segment(1) == 'news' ? 'active' : '')?>"><a href="<?php echo site_url()?>news">Berita</a></li>
                        <!--<li class="<?php echo ($this->uri->segment(3) == '9' ? 'active' : '')?>"><a href="<?php echo site_url()?>page/index/9">About</a></li>-->
                    </ul>
                </nav>
            </div>            