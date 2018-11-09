<?php $this->load->view('backend/header')?>
<div class="row">
  <div class="col-lg-12">
      <ul class="breadcrumb">
      	<li>
        	<a href="<?php echo site_url()?>admin/pages">
            	<i class="icon-file"></i>&nbsp;
                Kelola Halaman
            </a>
        </li>
        <li>Edit Halaman</a></li>
      </ul>
  </div>    
</div>
<div class="row">
    <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Edit Halaman
          </header>
          <div class="panel-body">

		<?php if (@$errors):?>
            <div class="alert alert-block alert-danger fade in">
              <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
              </button>
              <strong>Ada Kesalahan</strong><br />
              <?php echo validation_errors()?>
              <?php echo @$error_upload['error']?>
            </div>
        <?php endif?>
        <?php $success = $this->session->flashdata('success');?>
		<?php if (@$success):?>
            <div class="alert alert-success fade in">
              <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
              </button>
              <strong>Sukses!</strong> data berita berhasil dengan sukses.
            </div>
        <?php endif?>

          	<form class="form-horizontal tasi-form" method="post" action="#" enctype="multipart/form-data">
            	<input type="hidden" name="id" value="<?php echo @$detail->id?>" />
            	<div class="form-group">
                	<label class="col-sm-2 col-sm-2 control-label">Judul Halaman *</label>
                    <div class="col-sm-10">
                    	<input type="text" class="form-control" name="title" value="<?php if (@$detail){ echo @$detail->title;} else { echo set_value('title');}?>">
                    </div>
                </div>
            	<div class="form-group">
                	<label class="col-sm-2 col-sm-2 control-label">Nama Menu *</label>
                    <div class="col-sm-10">
                    	<input type="text" class="form-control" name="menu_name" value="<?php if (@$detail){ echo @$detail->menu_name;} else { echo set_value('menu_name');}?>">
                    </div>
                </div>
            	<div class="form-group">
                	<label class="col-sm-2 col-sm-2 control-label">Menu *</label>
                    <div class="col-sm-10">
                        <select name="position" class="form-control" >
                            <option value="0" <?php if (@$detail->position == 0){ echo 'selected';}?>>Tidak ditampilkan.</option>
                            <option value="1" <?php if (@$detail->position == 1){ echo 'selected';}?>>Ditampilkan diatas.</option>
                            <option value="2" <?php if (@$detail->position == 2){ echo 'selected';}?>>Ditampilkan dibawah.</option>
                            <option value="3" <?php if (@$detail->position == 3){ echo 'selected';}?>>Ditampilkan dikeduanya.</option>
                        </select>                    	
                    </div>
                </div>
            	<div class="form-group">
                	<label class="col-sm-2 col-sm-2 control-label">Menu Order *</label>
                    <div class="col-sm-10">
                    	<input type="text" class="form-control" name="order_seq" value="<?php if (@$detail){ echo @$detail->order_seq;} else { echo set_value('order_seq');}?>">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label col-sm-2">Isi Halaman *</label>
                  <div class="col-sm-10">
                      <textarea class="form-control ckeditor" name="description" rows="6"><?php if (@$detail){ echo @$detail->description;} else { echo set_value('description');}?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                      <input type="submit" class="btn btn-info" name="submit" value="Simpan">
                  </div>
                </div>
            </form>
          </div>
      </section>
    </div>
</div>
<script type="text/javascript" src="<?php echo site_url()?>assets/javascripts/admin/ckeditor/ckeditor.js"></script>
<?php $this->load->view('backend/footer')?>