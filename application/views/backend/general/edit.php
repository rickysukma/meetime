<?php $this->load->view('backend/header')?>
<div class="row">
  <div class="col-lg-12">
      <ul class="breadcrumb">
      	<li>
        	<a href="<?php echo site_url()?>admin/pages">
            	<i class="icon-file"></i>&nbsp;
                Kelola General Web
            </a>
        </li>
        <li>Edit General Web</a></li>
      </ul>
  </div>    
</div>
<div class="row">
    <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Edit General Web
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
              <strong>Sukses!</strong> data berhasil dengan sukses.
            </div>
        <?php endif?>

          	<form class="form-horizontal tasi-form" method="post" action="#">
            	<input type="hidden" name="id" value="<?php echo @$detail->id?>" />
            	<div class="form-group">
                	<label class="col-sm-2 col-sm-2 control-label">Isi <?php echo $detail->name?> *</label>
                    <div class="col-sm-10">
                    	<input type="text" class="form-control" name="value" value="<?php if (@$detail){ echo @$detail->value;} else { echo set_value('value');}?>">
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