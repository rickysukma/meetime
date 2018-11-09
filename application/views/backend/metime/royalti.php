<?php $this->load->view('backend/header')?>
<div class="row">
  <div class="col-lg-12">
      <ul class="breadcrumb">
      	<li>
            <i class="icon-home"></i>
            Home
        </li>
      </ul>
  </div>    
</div>

<!--state overview end-->

<div class="row">
  <div class="col-lg-12">
      <!-- grid -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script>
$(document).ready(function() {
    $('#datatabel').DataTable();
});
</script>
<div class="panel panel-default">
<div class='panel-heading'>
<b>Data Royalti</b>
</div>
<div class="panel-body">
<table id="datatabel" class="table table-striped table-bordered nowrap" width="98%">
<thead>
<tr>
	<th width="100">No</th>
	<th width="100">ID User</th>
	<th width="100">Username</th>
	<th width="100">Nama User</th>
	<th width="150">Royalti</th>
	<th width="50">Downline</th>
	<th width="50">ID Order</th>
	<th width="100">Total Order</th>
</tr>
</thead>
<tbody>
<?php
function nominal($int) {
	return number_format($int, 0, ",",".");
}
$no=1;

foreach($list as $data)
{
$bonusroyalti = 0;
$bonuspoin = 0;
//validasi bonus
$arrdl    = explode(",", $data->downline);
$cekarrdl = count($arrdl);
$cekbonus= $this->Model_bonus->validasi_bonus($data->id_order);
if($data->downline == 0)
{
	//validasi royalti user
	if(
		($data->id_user == $cekbonus['id_user'][0]) and
		($data->bonusroyalti == $cekbonus['royalti'][0]) and
		($data->bonuspoin == $cekbonus['poin'][0])
	  )
	{
		$bonusroyalti = $data->bonusroyalti;
		$bonuspoin = $data->bonuspoin;
	} else {
		$bonusroyalti = 0;
		$bonuspoin = 0;
	}
}

if($data->downline != 0 and $cekarrdl == 1 )
{
	//validasi royalti user
	if(
		($data->id_user == $cekbonus['id_user'][1]) and
		($data->bonusroyalti == $cekbonus['royalti'][1]) and
		($data->bonuspoin == $cekbonus['poin'][1])
	  )
	{
		$bonusroyalti = $data->bonusroyalti;
		$bonuspoin = $data->bonuspoin;
	} else {
		$bonusroyalti = 0;
		$bonuspoin = 0;
	}
}

if($data->downline != 0 and $cekarrdl == 2 )
{
	//validasi royalti user
	if(
		($data->id_user == $cekbonus['id_user'][2]) and
		($data->bonusroyalti == $cekbonus['royalti'][2]) and
		($data->bonuspoin == $cekbonus['poin'][2])
	  )
	{
		$bonusroyalti = $data->bonusroyalti;
		$bonuspoin = $data->bonuspoin;
	} else {
		$bonusroyalti = 0;
		$bonuspoin = 0;
	}
}
?>
<tr>
	<td><?php echo $no;?></td>
	<td><?php echo $data->id_user;?></td>
	<td><?php echo $data->username;?></td>
	<td><?php echo $data->name;?></td>
	<td align="right"><?php echo nominal($bonusroyalti);?></td>
	<td><?php echo $data->downline;?></td>
	<td><?php echo $data->id_order;?></td>
	<td align="right"><?php echo nominal($data->total);?></td>
</tr>
<?php 
$no++;
}
?>
</tbody>
</table>
</div>
</div>

  </div>
</div>

<?php $this->load->view('backend/footer')?>