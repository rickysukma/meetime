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
	     
<div id="contactform" class="item">
	<div class="contactform img-overlay"></div>
	<div class="content">
		<div class="content_overlay"></div>
		<div class="content_inner" >
           	<div class="row contentscroll">
				<div class="container col-md-12">
                    <div class="col-md-12 content_text">
                        <div id="contactforms">
                        	<h1>Contact Form</h1>
                        	<?php if (@$success):?>
                        		<div class="alert alert-success fade in">
                        			Pesan sudah dikirim, silahkan tunggu balasan dari kami.
                        		</div>
                        	<?php endif?>
                           	<form id="contact_form" class="cont_form pad_top13" action="<?php echo site_url()?>contact" method="post">
								<p>Silahkan isi form dibawah ini untuk keperluan apapun, seperti pemesanan produk, bertanya, dan hal lainnya.</p>
								<div class="clearfix cont_form pad_top20"> 
									<input type="text" name="name" class="validate['required'] textbox1" placeholder="* Nama Lengkap : " onfocus="this.placeholder = ''" onBlur="this.placeholder = '* Nama Lengkap :'" />
									<input type="text" name="email"  class="validate['required','email']  textbox1" placeholder="* Alamat Email : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Alamat Email :'" />
									<input type="text" name="phone" class="validate['required','phone']  textbox1" placeholder="* Phone : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Phone :'" />
									<textarea name="message" class="validate['required'] messagebox1" placeholder="* Pesan/Pertanyaan : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Pesan/Pertanyaan :'"></textarea>
									<input type="submit" id="contactsubmitBtn1" value="Kirim" name="Confirm" class="submitBtn" onClick="document.getElementById('contact_form').submit();">
                				</div>
							</form>
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