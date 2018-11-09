<form id="user-form" method="POST" action="<?= base_url('admin/easyui/do_save')?>">
	<table class="table">
		
		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Username</td>
			<td><input style="width: 100%" class="easyui-textbox" prompt="Username" data-options="maxlength:50,required:true" name="username"></td>
		</tr>
		<input type="" name="idsponsor" value="<?php echo $this->session->userdata('user_id'); ?>" hidden/>
		<?php if ($mode=='add'): ?>
			<input type="" name="typeaccount" value="<?=$typeaccount?>" hidden/>
		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Password</td>
			<td><input style="width: 100%" class="easyui-passwordbox" prompt="Password" iconWidth="28" name="password"></td>
		</tr>
		<?php endif ?>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">NIK</td>
			<td><input style="width: 100%" class="easyui-textbox" prompt="NIK" data-options="maxlength:50" name="nik"></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Nama</td>
			<td><input style="width: 100%" class="easyui-textbox" prompt="Nama" data-options="maxlength:50" name="name"></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Tempat Lahir</td>
			<td><input style="width: 100%" class="easyui-textbox" prompt="Tempat Lahir" data-options="maxlength:50" name="birth_city"></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Tanggal Lahir</td>
			<td><input style="width: 200px" data-options="formatter:myformatter,parser:myparser" class="easyui-datebox" name="birth_date"></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">No. Telepon</td>
			<td><input style="width: 200px" class="easyui-textbox" data-options="maxlength:15" name="phone"></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Email</td>
			<td><input style="width: 200px" class="easyui-textbox" data-options="maxlength:50" name="email"></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Alamat</td>
			<td><input style="width: 100%;height:125px"  class="easyui-textbox" multiline="true" data-options="maxlength:50" name="address"></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Kota</td>
			<td><input style="width: 200px" class="easyui-textbox" data-options="maxlength:50" name="city"></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Provinsi</td>
			<td><input style="width: 200px" class="easyui-textbox" data-options="maxlength:100" name="province"></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Kode Pos</td>
			<td><input style="width: 200px" class="easyui-textbox" data-options="maxlength:15" name="poscode"></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Nama Bank</td>
			<td><input style="width: 200px" class="easyui-textbox" data-options="maxlength:15" name="bankname"></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">No. Rekening</td>
			<td><input style="width: 200px" class="easyui-textbox" data-options="maxlength:50" name="number"></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Nama Pemilik Rekening</td>
			<td><input style="width: 200px" class="easyui-textbox" data-options="maxlength:100" name="nameaccount"></td>
		</tr>
		<?php if($this->session->userdata('user_id')==1){ ?>
		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Level User</td>
			<td><select class="easyui-combobox" name="level" style="width:50%;">
                <option value="O">Operator</option>
                <option value="A">Admin</option>
            </select></td>
		</tr>

		<tr>
			<td style="width: 30%; text-align: right;vertical-align: middle;">Status User</td>
			<td><select class="easyui-combobox" name="status" style="width:50%;">
                <option value="0">Tidak Aktif</option>
                <option value="1">Aktif</option>
            </select></td>
		</tr>
		<?php } ?>
		<input type="hidden" name="id" value="0">
		<input type="hidden" name="<?=get_instance()->security->get_csrf_token_name();?>" value="<?=get_instance()->security->get_csrf_hash();?>" />
	</table>
</form>