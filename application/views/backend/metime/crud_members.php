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
      <section class="panel" style="margin-top: 10px;">
        <table id="user-datagrid" class="easyui-datagrid" style="width:100%;height:450px"
                url="<?= base_url('admin/easyui/lists/'.$id)?>" 
                method="get"
                title="Data Member" toolbar="#user-toolbar"
                rownumbers="true" singleselect="true" pagination="true">
            <thead>
                <tr>
                    <th field="username">ID</th>
                    <th field="nik">NIK</th>
                    <th field="name">NAMA</th>
                    <th field="birth_date">TANGGAL LAHIR</th>
                    <th field="phone">TELP</th>
                    <th field="email">EMAIL</th>
                    <th field="address" width="50">ALAMAT</th>
                    <th field="city">KOTA</th>
                    <th field="province">PROVINSI</th>
                    <th field="poscode">KODE POS</th>
                    <th field="bankname">BANK</th>
                    <th field="number">NO REK</th>
                    <th field="nameaccount">NAMA REK</th>
                    <th field="timejoin">JOIN</th>
                    <th field="last_login">LAST LOGIN</th>
                </tr>
            </thead>
        </table>

        <div id="user-toolbar">
          <a id="user-add" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-add'">Add</a>
          <a id="user-edit" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-edit'">Edit</a>
		  <?php if($this->session->userdata('user_id')==1){ ?>
          <a id="user-remove" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-remove'">Remove</a>
		  <?php } ?>
        </div>

        <div id="user-dialog-toolbar">
          <a id="user-save" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-save'">Save</a>
          <a id="user-cancel" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-cancel'">Cancel</a>
        </div>

        <div id="user-dialog"
          class="easyui-dialog"
          style="width:60%;height:85%;"
          data-options="
            modal: true,
            closed: true,
            toolbar:'#user-dialog-toolbar'
          "
        ></div>

      </section>
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
    
    var dg = $("#user-datagrid");
    var dlg = $("#user-dialog");

    var dialog_state = 'add';

    $("#user-add").bind('click', function(e) {

      dialog_state = 'add';

      dlg.dialog({
          onLoad: function(){
            return
          }
        }).dialog('setTitle', 'Tambah Data User')
        .dialog('open').dialog('refresh', '<?= base_url("admin/easyui/form/add/".$id)?>');
    });

    $("#user-edit").bind('click', function(e) {
      
      var row = dg.datagrid('getSelected');
      if (row) {
        dialog_state = 'edit';
        
        dlg.dialog({onLoad :function(){
              $('#user-form').form('load', '<?= base_url('admin/easyui/edit/')?>' + row.id)
            }
          }).dialog('setTitle', 'Ubah Data User')
          .dialog('open').dialog('refresh', '<?= base_url("admin/easyui/form/edit")?>');
      }
      else {
        $.messager.alert('Error','Pilih data yang akan di edit!','error');
      }

    });

    $("#user-remove").bind('click', function(e) {
      
      var row = dg.datagrid('getSelected');
      if (row) {
         $.messager.confirm('Konfirmasi', 'Apakah anda yakin?', function(r){
             if (r){
                 $.ajax({
                    url : "<?= base_url('admin/easyui/do_delete'); ?>",
                    type: 'post',
                    data: { "id":row.id },            
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
             }
         });       
      }
      else {
        $.messager.alert('Error','Pilih data yang akan di hapus!','error');
      }

    });

    $("#user-cancel").bind('click', function(e) {
      
      dlg.dialog('close');

    });

    $("#user-save").bind('click', function(e) {
      $('#user-form').form('submit',{
          onSubmit:function(){
              return $(this).form('enableValidation').form('validate');
          },
          success: function(res) {
            var data = $.parseJSON(res);

            if (data.success == true) {
              dlg.dialog('close');
              dg.datagrid('reload');

              $.messager.show({
                  title:'Info',
                  msg:data.message,
                  showType:'fade'
              });
            } else {
              $.messager.alert('Error',data.message,'Error');
            }
          }
      });
    });

  });

</script>

<?php $this->load->view('backend/footer')?>