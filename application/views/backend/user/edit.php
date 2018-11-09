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
        <li><a href="<?php echo site_url()?>admin/user/edit"><i></i>Ubah Profile</a></li>
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
          <h1> Edit Profile</h1>
          <form class="form-horizontal" role="form" method="post" action="<?php echo site_url()?>admin/user/do_edit">
              <div class="form-group">
                  <label  class="col-lg-2 control-label">Name Lengkap</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" id="f-name" placeholder="" name="name" value="<?php echo $profile[0]->name?>">
                  </div>
              </div>
              <div class="form-group">
                  <label  class="col-lg-2 control-label">Alamat Email</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" id="l-name" placeholder="" name="email" value="<?php echo $profile[0]->email?>">
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