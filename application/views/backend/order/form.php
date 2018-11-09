<form id="input-item-order" method="POST" action="<?= base_url('admin/order/do_save')?>">
	<table class="table">
		
		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Produk</td>
			<td><select name="id_produk" id="id_produk" class="easyui-combogrid" style="width:100%" data-options="
                    panelWidth: 500,
                    idField: 'id',
                    textField: 'name',
                    url: '<?= base_url('admin/order/listsproduk')?>',
                    method: 'get',
                    columns: [[
                        {field:'id',title:'Item ID',width:80},
                        {field:'name',title:'Product',width:200},
                        {field:'regular_price',title:'Harga Normal',width:120,align:'right'},
                        {field:'price',title:'Harga Diskon',width:120,align:'right'},
                        {field:'status',title:'Status',width:60,align:'center'}
                    ]],
                    fitColumns: true,
                    label: 'Select Item:',
                    labelPosition: 'top'
                ">
            </select></td>
		</tr>
		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Jumlah</td>
			<td><input style="width: 100%" class="easyui-textbox" prompt="Jumlah" data-options="maxlength:50" name="qty"></td>
		</tr>
		<input type="hidden" name="id" value="0">
		<input type="hidden" name="orderid" id="orderid" value="0">
		<input type="hidden" name="<?=get_instance()->security->get_csrf_token_name();?>" value="<?=get_instance()->security->get_csrf_hash();?>" />
	</table>
</form>