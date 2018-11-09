<?php $this->load->view('backend/header')?>
<div class="row">
  <div class="col-lg-12">
      <ul class="breadcrumb">
      	<li>
            <i class="icon-home"></i>
            Home
        </li>
      </ul>
  </div>    
</div>

<!--state overview end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Selamat datang di halaman panel, berikut link affiliate anda.<br>
              <b>http://metime.co.id/?aff=<?php echo $this->session->userdata('user_id'); ?></b>
          </header> 
      </section>


<?php $this->load->view('backend/footer')?>