<?php $this->load->view('head')?>
<body>
<!--PRELOADER-->
	<section id="jSplash">
		<div id="circle"></div>
	</section>

<!--Nice Scroll-->           <!--Used For Mobile Resolution-->
<div id="menutop"></div>
<!--Nice Scroll--> 

<!--Wrapper 
=============================-->
<div id="wrapper">
<div id="mask">

<!--Header 
=============================-->

<div id="header" class="header">
<?php $this->load->view('menu')?>

<!-- // Header 
=============================-->

<!--Menu with image big 
=============================--> 	
	     
<div id="menu2" class="item">
	<div class="content">
		<div class="content_overlay"></div>
		<div class="content_inner">
			<div class="row contentscroll">
				<div class="container col-md-12">
                    <div class="col-md-12 content_text">
                    	<h1>Berita</h1>
                        <div class="home3">
            				<div class="col-md-12 pad_top20">
            					<?php if ($result):?>
            						<?php foreach ($result as $row):?>
		           						<div class="row">
		            						<div class="menu_content clearfix">
												<div class="col-md-9 text-left">
		                    						<div class="title-splider">
		                  	  							<h4 class="clearfix">
		                  	  								<span class="left border_bottom"><?php echo $row->title?></span>
		                  	  							</h4>
		                    						</div>
		                  	  						<?php echo $row->description?>
												</div>
		            						</div>
										</div>
									<?php endforeach?>
								<?php endif?>
            				</div>
            			</div>
           			</div>
    			</div>
            </div>
		</div>
	</div>
</div>
	
<!-- // Menu with image Big 
=============================--> 

<?php $this->load->view('footer')?>

</div>
</div>

<?php $this->load->view('footer-js')?>

</body>
</html>
<!-- 347 -->