<?php $this->load->view('backend/header')?>

<div class="row">
  <div class="col-lg-12">
      <ul class="breadcrumb">
      	<li>
        	<a href="<?php echo site_url()?>admin/contact">
            	<i class="icon-file"></i>&nbsp;
                Data Kontak
            </a>
        </li>
        <li><a href="<?php echo site_url()?>admin/contact/setting">Setting</a></li>
      </ul>
  </div>    
</div>

<div class="row">
    <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Data Kontak
          </header> 
          <div class="panel-body">
          	  <?php if ($result):?>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                  <tr>
                      <th class="numeric">No.</th>
                      <th>Nama</th>
                      <th>E-Mail</th>
                      <th>Subjek</th>
                      <th>Tanggal Kirim</th>
                      <th>Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1?>
                  <?php foreach ($result as $row):?>
                  <tr>
                      <td class="numeric"><?php echo $i?>.</td>
                      <td><?php echo $row->name?></td>
                      <td><?php echo $row->email?></td>
                      <td><?php echo $row->subject?></td>
                      <td><?php echo dateIna($row->post_date)?></td>
                      <td align="center">
					  	<?php if ($row->is_read == "1"):?>
                        	<a id="add-sticky" class="btn btn-success  btn-sm" href="javascript:;">Sudah Dibaca</a>
                        <?php else:?>
							<a id="add-gritter-light" class="btn btn-warning  btn-sm" href="javascript:;">Belum Dibaca</a> 
						<?php endif?>
                        <a id="add-regular" class="btn btn-default btn-sm" href="javascript:;">Detail</a>                       
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
                      Data Kontak tidak ada yang masuk.
                  </div>

          	  <?php endif?>
          </div>
                  
      </section>
      
    </div>
</div>

<?php $this->load->view('backend/footer')?>