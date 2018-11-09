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
        <table id="input-order-datagrid" class="easyui-datagrid" style="width:100%;height:450px"
                url="<?= base_url('admin/order/lists_order/')?>/<?php echo $this->session->userdata('user_id')?>"
                method="get"
                title="List Item Produk" toolbar="#list-order-toolbar"
                rownumbers="true" singleselect="true" pagination="true" showFooter="true" fitColumns="true">
            <thead>
                <tr>
                    <th field="id">ID</th>
                    <th field="id_user">Id User</th>
                    <th field="id_order">Id Order</th>
                </tr>
             </thead>
            
        </table>

        <div id="list-order-toolbar">
          <a id="item-order-add" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-add'">Add</a>
        </div>

      </section>
  
  </div>
</div>

<script type="text/javascript">

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
        location.href = '/admin/meetime/input_order';
      
    });

  });

</script>

<?php $this->load->view('backend/footer')?>