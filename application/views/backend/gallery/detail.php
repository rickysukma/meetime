<?php $this->load->view('backend/header')?>
<div class="row">
  <div class="col-lg-12">
      <ul class="breadcrumb">
      	<li>
        	<a href="<?php echo site_url()?>admin/gallery">
            	<i class="icon-file"></i>&nbsp;
                Kelola Gallery
            </a>
        </li>
        <li>Detail Gallery</a></li>
      </ul>
  </div>    
</div>
<div class="row">
    <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Detail Gallery
          </header>
          <div class="panel-body">
          	<table cellpadding="8">
                <?php if ($detail->picture):?>
                    <tr>
                        <td valign="top">Gambar</td><td><img src="<?php echo site_url()."assets/images/gallery/thumbnail/".$detail->picture?>" /></td>
                    </tr>
                <?php endif?>
                <tr>
                	<td>Pengirim</td><td><?php echo $this->MUser->getNameById($detail->user_id)?></td>
                </tr>
                <tr>
                	<td nowrap="nowrap">Tanggal Kirim</td><td><?php echo dateIna($detail->post_date)?></td>
                </tr>
                <tr>
                	<td></td>
                    <td>
                        <a class="btn btn-danger  btn-sm" href="<?php echo site_url()?>admin/gallery/delete/<?php echo $detail->id?>" onclick="return confirm('Anda yakin akan menghapus gambar ini?');">Hapus Gambar</a>
                    </td>
                </tr>
            </table>
          </div>
      </section>
    </div>
</div>
<?php $this->load->view('backend/footer')?>