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
        <li>Detail Halaman</a></li>
      </ul>
  </div>    
</div>
<div class="row">
    <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Detail Halaman
          </header>
          <div class="panel-body">
          	<table cellpadding="8">
            	<tr>
                	<td>Judul Halaman</td><td><?php echo $detail->title?></td>
                </tr>
                <tr>
                	<td>Menu</td><td><?php echo $this->MPages->menuPosition($detail->position)?></td>
                </tr>
            	<tr>
                	<td>Menu Order</td><td><?php echo $detail->order_seq?></td>
                </tr>
                <tr>
                	<td valign="top">Isi Halaman</td><td><?php echo $detail->description?></td>
                </tr>
                <tr>
                	<td>Pengirim</td><td><?php echo $this->MUser->getNameById($detail->user_id)?></td>
                </tr>
                <tr>
                	<td nowrap="nowrap">Tanggal Kirim</td><td><?php echo dateIna($detail->post_date)?></td>
                </tr>
                <tr>
                	<td nowrap="nowrap">Tanggal Modifikasi</td><td><?php echo dateIna($detail->last_update)?></td>
                </tr>
                <tr>
                	<td></td>
                    <td>
                    	<a class="btn btn-success  btn-sm" href="<?php echo site_url()?>admin/pages/add/<?php echo $detail->id?>">Edit Halaman</a>
                    </td>
                </tr>
            </table>
          </div>
      </section>
    </div>
</div>
<?php $this->load->view('backend/footer')?>