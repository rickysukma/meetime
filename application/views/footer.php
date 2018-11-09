        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 footer-section">
                        <div class="footer-contact">
                            <div class="footer-logo"><img src="<?php echo site_url()?>/assets/images/logo_footer.png" width="180" alt="<?php echo $this->MGeneral->getNameByCode('NAME')?>" /></div>
                            <p><?php echo $this->MGeneral->getNameByCode('DESCR')?></p><address><p>
                        <?php echo $this->MGeneral->getNameByCode('ALMT')?><br>
                        <?php echo $this->MGeneral->getNameByCode('EMAIL')?><br>
                        <?php echo $this->MGeneral->getNameByCode('TELP')?>
                    </p></address><!--<a href="<?php echo site_url()?>contact">Kontak Kami &rarr;</a>--></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-sm-4 footer-section">
                                <h4 class="footer-heading">Informasi</h4>
                                <ul class="list-unstyled">
                                    <?php $menuBottom = $this->MPages->getListBottom();?>
                                    <?php if ($menuBottom){?>
                                        <?php foreach ($menuBottom as $dataBottom){?>
                                            <li><a href="<?php echo site_url()?>page/index/<?php echo $dataBottom->id;?>"><?php echo $dataBottom->menu_name;?></a></li>
                                        <?php } ?>	
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        &copy; 2018. <?php echo $this->MGeneral->getNameByCode('NAME')?>.
                    </div>
                    <div class="col-md-5 cleafix">
                        <ul class="list-inline">
                            <li><a target="_blank" href="<?php echo $this->MGeneral->getNameByCode('FB')?>"><span class="fa fa-lg fa-facebook"></span></a></li>
                            <li><a target="_blank" href="<?php echo $this->MGeneral->getNameByCode('TW')?>"><span class="fa fa-lg fa-twitter"></span></a></li>                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <noscript id="deferred-styles">
        <link href="<?php echo site_url()?>assets/new/lightgallery.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel='stylesheet' type='text/css'>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    </noscript>
    <!-- Scripts -->
    <script src="<?php echo site_url()?>assets/new/jquery.js"></script>
    <script>
        var loadDeferredStyles = function() {
            var addStylesNode = document.getElementById("deferred-styles");
            var replacement = document.createElement("div");
            replacement.innerHTML = addStylesNode.textContent;
            document.body.appendChild(replacement);
            addStylesNode.parentElement.removeChild(addStylesNode);
        };
        var raf = requestAnimationFrame || mozRequestAnimationFrame ||
            webkitRequestAnimationFrame || msRequestAnimationFrame;
        if (raf) raf(function() {
            window.setTimeout(loadDeferredStyles, 0);
        });
        else window.addEventListener('load', loadDeferredStyles);
    </script>
</body>

</html>