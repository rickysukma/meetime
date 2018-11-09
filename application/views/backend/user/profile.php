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
              <h1>Data Anda</h1>
              <?php if ($this->session->flashdata('update_profile') == TRUE):?>
              <div class="alert alert-success fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="icon-remove"></i>
                  </button>
                  <strong>Sukses!</strong> Data profile berhasil diubah.
              </div>
              <?php endif?>
              <div class="row">
                  <div class="bio-row">
                      <p><span>Username </span>: <?php echo $this->session->userdata('username')?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Password </span>: ***</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Name Lengkap </span>: <?php echo $profile[0]->name?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: <?php echo $profile[0]->email?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Status</span>: Aktif</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Login Terakhir</span>: <?php echo dateIna($this->session->userdata('last_login'))?></p>
                  </div>
              </div>
          </div>
      </section>
  </aside>
</div>

<?php $this->load->view('backend/footer')?>