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
        <li><i></i>Lihat Semua</li>
      </ul>
  </div>    
</div>

<div class="row">
    <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Data Berita (<?php echo $page_info['record']?> Data) | <a id="add-sticky" class="btn btn-default btn-sm icon-plus" title="Tambah" href="<?php echo site_url()?>admin/news/add"></a>
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
                      <th>Tanggal Kirim</th>
                      <th>&nbsp;</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=$page_info['startlist']?>
                  <?php foreach ($result as $row):?>
                  <tr>
                      <td class="numeric"><?php echo ($i+1)?>.</td>
                      <td><?php echo $row->title?></td>
                      <td><?php echo $this->MUser->getNameById($row->user_id)?></td>
                      <td><?php echo dateIna($row->post_date)?></td>
                      <td align="center">
                        <a id="add-sticky" class="btn btn-success  btn-sm icon-gear" title="Detail" href="<?php echo site_url()?>admin/news/detail/<?php echo $row->id?>"></a>
                        <a id="add-gritter-light" class="btn btn-warning  btn-sm icon-pencil" title="Edit" href="<?php echo site_url()?>admin/news/add/<?php echo $row->id?>"></a> 
                        <a id="add-regular" class="btn btn-danger btn-sm icon-trash" title="Delete" onclick="return confirm('Anda yakin akan menghapus berita ini?');" href="<?php echo site_url()?>admin/news/delete/<?php echo $row->id?>"></a>                       
                      </td>
                  </tr>
                  <?php $i++?>
                  <?php endforeach?>
                  </tbody>
              </table>
              
              <div class="text-center">
              	<ul class="pagination">
                	<?php echo $page_info['pagination']?>
                </ul>
              </div>
            </section>
			<?php else:?>
              <div class="alert alert-warning fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="icon-remove"></i>
                  </button>
                  Data berita belum ada, silahkan tambah berita pada menu <strong>Tambah</strong> pada menu sebelah kiri, atau tanda <strong>+</strong> di atas.
              </div>            	
			<?php endif?>

        </div>        
      </section>
      
    </div>
</div>

<?php $this->load->view('backend/footer')?>