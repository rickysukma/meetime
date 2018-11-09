<?php $this->load->view('backend/header')?>

<div class="row">
  <div class="col-lg-12">
      <ul class="breadcrumb">
      	<li>
        	<a href="<?php echo site_url()?>admin/user">
            	<i class="icon-user"></i>
                User Profile
            </a>
        </li>
        <li><a href="<?php echo site_url()?>admin/user/password"><i></i>Ubah Password</a></li>
      </ul>
  </div>    
</div>

<div class="row">
<?php $this->load->view('backend/user/left.php')?>

<aside class="profile-info col-lg-9">
  <section class="panel">
      <div class="bio-graph-heading">
          Ada adalah sebagai user Administrator, dimana hak akses Anda full terhadap website ini, tidak diperkenankan untuk memberitahu username dan password ke orang lain yang tidak berkepentingan.
      </div>
      <div class="panel-body bio-graph-info">
          <h1> Ubah Password</h1>
          <?php if ($this->session->flashdata('pwd_failed') == TRUE):?>
          <div class="alert alert-block alert-danger fade in">
              <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
              </button>
              <strong>Upsss!</strong> Password lama yang Anda masukan tidak sama dengan yang sekarang.
          </div>
          <?php endif?>
          
		  <?php if ($this->session->flashdata('pwd_true') == TRUE):?>
          <div class="alert alert-success fade in">
              <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
              </button>
              <strong>Sukses!</strong> Password telah berhasil diubah.
          </div>
          <?php endif?>
          
          <form class="form-horizontal" role="form" method="post" action="<?php echo site_url()?>admin/user/do_password">
              <div class="form-group">
                  <label  class="col-lg-2 control-label">Password Lama</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" id="f-name" placeholder="" name="old_password">
                  </div>
              </div>
              <div class="form-group">
                  <label  class="col-lg-2 control-label">Password Baru</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" id="l-name" placeholder="" name="password">
                  </div>
              </div>
              <div class="form-group">
                  <label  class="col-lg-2 control-label">Re Password Baru</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" id="l-name" placeholder="" name="repassword">
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" class="btn btn-success">Simpan</button>
                      <button type="reset" class="btn btn-default">Reset</button>
                  </div>
              </div>
          </form>
      </div>
  </section>
</aside>
  
</div>

<?php $this->load->view('backend/footer')?>