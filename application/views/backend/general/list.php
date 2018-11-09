<?php $this->load->view('backend/header')?>

<div class="row">
  <div class="col-lg-12">
      <ul class="breadcrumb">
      	<li>
        	<a href="<?php echo site_url()?>admin/general">
            	<i class="icon-file"></i>&nbsp;
                Kelola General Web
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
              Data General Web
          </header> 
          <div class="panel-body">
			<?php $success = $this->session->flashdata('success');?>
            <?php if (@$success):?>
                <div class="alert alert-success fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="icon-remove"></i>
                  </button>
                  <strong>Berhasil!</strong>
                </div>
            <?php endif?>          
          	<?php if ($result):?>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                  <tr>
                      <th class="numeric">No.</th>
                      <th>Nama</th>
                      <th>Isi</th>
                      <th>&nbsp;</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1?>
                  <?php foreach ($result as $row):?>
                  <tr>
                      <td class="numeric"><?php echo $i?>.</td>
                      <td><?php echo $row->name?></td>
                      <td><?php echo $row->value?></td>
                      <td align="center">
                        <a id="add-gritter-light" class="btn btn-warning  btn-sm icon-pencil" title="Edit" href="<?php echo site_url()?>admin/general/edit/<?php echo $row->id?>"></a>                      
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