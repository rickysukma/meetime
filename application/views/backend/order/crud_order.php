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
  <div class="col-lg-7">
      <!-- grid -->
      <section class="panel" style="margin-top: 10px;">
        <table id="input-order-datagrid" class="easyui-datagrid" style="width:100%;height:450px"
                url="<?= base_url('admin/order/lists/')?>/<?php echo $this->session->userdata('user_id')?>"
                method="get"
                title="List Item Produk" toolbar="#list-order-toolbar"
                rownumbers="true" singleselect="true" pagination="true" showFooter="true" fitColumns="true">
            <thead>
                <tr>
                    <th field="id">ID</th>
                    <th field="id_produk">ID Produk</th>
                    <th field="nama_produk">Nama Produk</th>
                    <th field="harga_produk">Harga</th>
                    <th field="qty">Jumlah</th>
                    <th field="total">Total</th>
                </tr>
             </thead>
            
        </table>

        <div id="list-order-toolbar">
          <a id="item-order-add" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-add'">Add</a>
          <a id="item-order-edit" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-edit'">Edit</a>
          <a id="item-order-remove" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-remove'">Remove</a>
        </div>

        <div id="order-dialog-toolbar">
          <a id="item-order-save" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-save'">Save</a>
          <a id="item-order-cancel" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-cancel'">Cancel</a>
        </div>

        <div id="input-order-dialog"
          class="easyui-dialog"
          style="width:60%;height:85%;"
          data-options="
            modal: true,
            closed: true,
            toolbar:'#order-dialog-toolbar'
          "
        ></div>

      </section>
  
  </div>
  <div class="col-lg-5">
      <div class="col-lg-12"> Total Belanja: </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-5">Total Belanja: </div>
          <div class="col-lg-7"><input id="inputtotal" value="<?php echo $total_order[0]->total; ?>" disabled/></div>
      </div>
      
      <div class="col-lg-12">Alamat Pengiriman: </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-5">Atas Nama : </div>
          <div class="col-lg-7"><input id="atas_nama"/></div>
      </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-5">Alamat : </div>
          <div class="col-lg-7"><input id="alamat1"/></div>
      </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-5">Kecamatan : </div>
          <div class="col-lg-7"><input id="kecamatan"/></div>
      </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-5">Kota / Kabupaten : </div>
          <div class="col-lg-7"><input id="kabupaten"/></div>
      </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-5">Provinsi : </div>
          <div class="col-lg-7"><input id="provinsi"/></div>
      </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-5">Kode Pos : </div>
          <div class="col-lg-7"><input id="kodepos"/></div>
      </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-5">Email : </div>
          <div class="col-lg-7"><input type="email" id="email"/></div>
      </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-5">No Telpon : </div>
          <div class="col-lg-7"><input id="no_telp"/></div>
      </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-5">Kirim Via : </div>
          <div class="col-lg-7"><input id="kirim_via"/></div>
      </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-5">Ongkos Kirim : </div>
          <div class="col-lg-7"><input id="ongkir" type="number" /></div>
      </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-5">Total Bayar: </div>
          <div class="col-lg-7"><input id="totalbayar" value="<?php echo $total_order[0]->total; ?>" disabled/></div>
      </div>
      <div class="col-lg-12" style="margin-bottom:10px;float:left;">
          <div class="col-lg-6"><button id="save_order" class="btn btn-primary btn-block">Simpan</button></div>
          <div class="col-lg-6"><button id="cancel_order" class="btn btn-primary btn-block">Batal</button></div>
      </div>
  </div>
</div>

<script type="text/javascript">

  function myformatter(date){
      var y = date.getFullYear();
      var m = date.getMonth()+1;
      var d = date.getDate();
      return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
  }
  function myparser(s){
      if (!s) return new Date();
      var ss = (s.split('-'));
      var y = parseInt(ss[0],10);
      var m = parseInt(ss[1],10);
      var d = parseInt(ss[2],10);
      if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
          return new Date(y,m-1,d);
      } else {
          return new Date();
      }
  }
  $(function($) {
      $.ajaxSetup({
          data: {
              '<?php echo get_instance()->security->get_csrf_token_name(); ?>' : '<?php echo get_instance()->security->get_csrf_hash(); ?>'
          }
      });
  });


  $(document).ready(function() {
    
    var dg = $("#input-order-datagrid");
    var dlg = $("#input-order-dialog");
    var dialog_state = 'add';
    
    $("#item-order-add").bind('click', function(e) {

      dialog_state = 'add';

      dlg.dialog({
          onLoad: function(){
            return
          }
        }).dialog('setTitle', 'Tambah Item Produk')
        .dialog('open').dialog('refresh', '<?= base_url("admin/order/form/add/")?>');
    });

    $("#item-order-edit").bind('click', function(e) {
      
      var row = dg.datagrid('getSelected');
      if (row) {
        dialog_state = 'edit';
        
        dlg.dialog({onLoad :function(){
            $('#input-item-order').form('load', '<?= base_url('admin/order/edit/')?>' + row.id)
            }
          }).dialog('setTitle', 'Ubah data produk')
          .dialog('open').dialog('refresh', '<?= base_url("admin/order/form/edit")?>');
      }
      else {
        $.messager.alert('Error','Pilih data yang akan di edit!','error');
      }

    });

    $("#item-order-remove").bind('click', function(e) {
      
      var row = dg.datagrid('getSelected');
      if (row) {
         $.messager.confirm('Konfirmasi', 'Apakah anda yakin?', function(r){
             if (r){
                 $.ajax({
                    url : "<?= base_url('admin/order/do_delete'); ?>",
                    type: 'post',
                    data: { "id":row.id },            
                    success : function(data)
                    {   
                      var response = $.parseJSON(data);
                      $.messager.alert('Info',response.message,'info');
                      dg.datagrid('reload');
                      $('#inputtotal').val(response.total[0].total);
                      $total
                      $total = parseInt($('#inputtotal').val())+parseInt($("#ongkir").val());
                        $('#totalbayar').val($total);
                    },
                    fail: function()
                    {
                      $.messager.alert('Error','Tidak dapat menghapus data!','error');
                    }  
                 });
             }
         });       
      }
      else {
        $.messager.alert('Error','Pilih data yang akan di hapus!','error');
      }

    });

    $("#item-order-cancel").bind('click', function(e) {
      
      dlg.dialog('close');

    });

    $("#item-order-save").bind('click', function(e) {
      $('#input-item-order').form('submit',{
          onSubmit:function(){
              return $(this).form('enableValidation').form('validate');
          },
          success: function(res) {
            var data = $.parseJSON(res);

            if (data.success == true) {
                dlg.dialog('close');
                dg.datagrid('reload');
                console.log(data.total[0].total);
                $('#inputtotal').val(data.total[0].total);
                $total = parseInt($('#inputtotal').val())+parseInt($("#ongkir").val());
                $('#totalbayar').val($total);
            } else {
              $.messager.alert('Error',data.message,'Error');
            }
          }
      });
    });
    
    $("#save_order").on('click', function() {
        $data = {
            'alamat' : $('#alamat1').val(),
            'kecamatan' : $('#kecamatan').val(),
            'kabupaten' : $('#kabupaten').val(),
            'provinsi' : $('#provinsi').val(),
            'kodepos' : $('#kodepos').val(),
            'ongkir' : $('#ongkir').val(),
            'atas_nama' : $('#atas_nama').val(),
            'kirim_via' : $('#kirim_via').val(),
            'email' : $('#email').val(),
            'no_telp' : $('#no_telp').val(),
        };

        $.ajax({
            url : "<?= base_url('admin/order/save_order'); ?>",
            type: 'post',
            data: $data,            
            success : function(data)
            {   
              var response = $.parseJSON(data);
              $.messager.alert('Info',response.message,'info');
              dg.datagrid('reload');
            },
            fail: function()
            {
              $.messager.alert('Error','Tidak dapat menghapus data!','error');
            }  
        });
    });
    $("#cancel_order").on('click', function() {
        $.ajax({
            url : "<?= base_url('admin/order/cancel_order'); ?>",
            type: 'post',
            //data: $data,            
            success : function(data)
            {   
              var response = $.parseJSON(data);
              $.messager.alert('Info',response.message,'info');
              dg.datagrid('reload');
            },
            fail: function()
            {
              $.messager.alert('Error','Tidak dapat menghapus data!','error');
            }  
        });
    });
    $( "#ongkir" ).keyup(function() {
        $total = parseInt($('#inputtotal').val())+parseInt($(this).val());
        $('#totalbayar').val($total);
    });

  });

</script>

<?php $this->load->view('backend/footer')?>