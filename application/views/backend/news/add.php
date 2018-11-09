<?php $this->load->view('backend/header')?>
<div class="row">
  <div class="col-lg-12">
      <ul class="breadcrumb">
      	<li>
        	<a href="<?php echo site_url()?>admin/news">
            	<i class="icon-file"></i>&nbsp;
                Kelola Berita
            </a>
        </li>
        <li>Tambah Berita</a></li>
      </ul>
  </div>    
</div>
<div class="row">
    <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Tambah Berita
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
                	<label class="col-sm-2 col-sm-2 control-label">Judul Berita *</label>
                    <div class="col-sm-10">
                    	<input type="text" class="form-control" name="title" value="<?php if (@$detail){ echo @$detail->title;} else { echo set_value('title');}?>">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label col-sm-2">Isi Berita *</label>
                  <div class="col-sm-10">
                      <textarea class="form-control ckeditor" name="description" rows="6"><?php if (@$detail){ echo @$detail->description;} else { echo set_value('description');}?></textarea>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">File Gambar</label>
                    <div class="col-sm-10">
						<?php if (@$detail):?>
                            <?php if ($detail->picture):?>
                                <img src="<?php echo site_url()."assets/images/news/thumbnail/".$detail->picture?>" /> 
                            <?php endif?>
                        <?php endif?>
                        <input type="file" name="picture" class="file-browse"> (Ukuran file: 300 x 225, Format: JPG, PNG)
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