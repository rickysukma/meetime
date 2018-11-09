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
        <li><i></i>Lihat Semua</li>
      </ul>
  </div>    
</div>

<div class="row">
    <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Data Halaman | <a id="add-sticky" class="btn btn-default btn-sm icon-plus" title="Tambah" href="<?php echo site_url()?>admin/pages/add"></a>
          </header> 
          <div class="panel-body">
			<?php $success = $this->session->flashdata('success');?>
            <?php if (@$success):?>
                <div class="alert alert-success fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="icon-remove"></i>
                  </button>
                  <strong>Hapus Data!</strong> Data telah terhapus dari sistem.
                </div>
            <?php endif?>          
          	<?php if ($result):?>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                  <tr>
                      <th class="numeric">No.</th>
                      <th>Judul</th>
                      <th>Pengirim</th>
                      <th>Modifikasi Terakhir</th>
                      <th>&nbsp;</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1?>
                  <?php foreach ($result as $row):?>
                  <tr>
                      <td class="numeric"><?php echo $i?>.</td>
                      <td><?php echo $row->title?></td>
                      <td><?php echo $this->MUser->getNameById($row->user_id)?></td>
                      <td><?php echo dateIna($row->last_update)?></td>
                      <td align="center">
                        <a id="add-sticky" class="btn btn-success  btn-sm icon-gear" title="Detail" href="<?php echo site_url()?>admin/pages/detail/<?php echo $row->id?>"></a>
                        <a id="add-gritter-light" class="btn btn-warning  btn-sm icon-pencil" title="Edit" href="<?php echo site_url()?>admin/pages/add/<?php echo $row->id?>"></a>
                        <?php if($row->id != 9) {?>
                        <a id="add-regular" class="btn btn-danger btn-sm icon-trash" title="Delete" onclick="return confirm('Anda yakin akan menghapus halaman ini?');" href="<?php echo site_url()?>admin/pages/delete/<?php echo $row->id?>"></a>
                        <?php } ?>
                      </td>
                  </tr>
                  <?php $i++?>
                  <?php endforeach?>
                  </tbody>
              </table>
            </section>
			<?php else:?>
              <div class="alert alert-warning fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="icon-remove"></i>
                  </button>
                  Data halaman tidak ada.
              </div>            	
			<?php endif?>
        </div>        
      </section>
    </div>
</div>

<?php $this->load->view('backend/footer')?>