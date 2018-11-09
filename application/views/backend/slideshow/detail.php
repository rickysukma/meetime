<?php $this->load->view('backend/header')?>
<link href="<?php echo site_url()?>assets/javascripts/admin/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
<div class="row">
  <div class="col-lg-12">
      <ul class="breadcrumb">
      	<li>
        	<a href="<?php echo site_url()?>admin/news">
            	<i class="icon-file"></i>&nbsp;
                Kelola Slideshow
            </a>
        </li>
        <li>Detail Slideshow</a></li>
      </ul>
  </div>    
</div>
<div class="row">
    <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Detail Slideshow
          </header>
          <div class="panel-body">
          	<table cellpadding="8">
            	<tr>
                	<td>Nama Slideshow</td><td><?php echo $detail->name?></td>
                </tr>
                <tr>
                	<td valign="top">Deskripsi Slideshow</td><td><?php echo $detail->description?></td>
                </tr>
                <?php if ($detail->picture):?>
                    <tr>
                        <td valign="top">Gambar</td>
                        <td>
                        	<a class="fancybox" href="<?php echo site_url()."assets/images/slideshow/main/".$detail->picture?>"><img src="<?php echo site_url()."assets/images/slideshow/thumbnail/".$detail->picture?>" /></a>
                            &nbsp; Klik gambar untuk memperbesar
                        </td>
                    </tr>
                <?php endif?>
                <tr>
                	<td nowrap="nowrap">Tanggal Kirim</td><td><?php echo dateIna($detail->post_date)?></td>
                </tr>
                <tr>
                	<td></td>
                    <td>
                    	<a class="btn btn-success  btn-sm" href="<?php echo site_url()?>admin/slideshow/add/<?php echo $detail->id?>">Edit Slideshow</a> &nbsp; 
                        <a class="btn btn-danger  btn-sm" href="<?php echo site_url()?>admin/slideshow/delete/<?php echo $detail->id?>" onclick="return confirm('Anda yakin akan menghapus gambar ini?');">Hapus Slideshow</a>
                    </td>
                </tr>
            </table>
          </div>
      </section>
    </div>
</div>

<?php $this->load->view('backend/footer')?>
<script type="text/javascript">
  $(function() {
	//    fancybox
	  jQuery(".fancybox").fancybox();
  });

</script>
<script src="<?php echo site_url()?>assets/javascripts/admin/fancybox/source/jquery.fancybox.js"></script>