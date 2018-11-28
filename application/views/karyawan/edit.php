<?php
include APPPATH . '/views/fragment/header.php';
include APPPATH . '/views/fragment/menu.php';
?>
<main>
	<div class="row col-sm-10">
		<form action="<?= base_url('karyawan/edit_save') ?>" class="form-horizontal"
			  name="formtambah"
			  method="post"
			  id="formtambah">
			<div class="form-group">
				<label class="control-label col-sm-4" for="nama">Nama:</label>
				<input type="text" name="nama" id="nama" size="30" required="required" value="<?= $karyawan['nama'] ?>">
			</div>

			<div class="form-group">
				<label class="control-label col-sm-4" for="email">Email:</label>
				<input type="text" name="email" id="email" value="<?= $karyawan['email'] ?>"
					   required="required" size="30">
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4" for="telpon">Telpon:</label>
				<input type="text" name="telpon" id="telpon" value="<?= $karyawan['telpon'] ?>"
					   required="required" size="15">
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4" for="telpon">Jabatan:</label>
				<select name="jabatan" id="jabatan">
					<?php
					foreach ($jabatan as $key => $value) {
						$selected = "";
						if ($key == $jabatan) {
							$selected = "selected";
						}
						?>
						<option value="<?= $key ?>"<?=$selected ?>> <?= $value['jabatan'] ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4" for="jeniskelamin">Jenis Kelamin:</label>
				<?php
				$checkedL ="";
				$checkedP = "";
				if ($karyawan['jeniskelamin'] =='L'){
					$checkedL = "checked";
					$checkedP = "";
				} else {
					$checkedL = "";
					$checkedP = "checked";
				}
				?>
				<input type="radio" name="jeniskelamin" id="L"
					   value="L" checked="checked"<?= $checkedL ?> >Laki-laki
				<input type="radio" name="jeniskelamin" id="P"
					   value="P" <?= $checkedL ?> >Perempuan
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4" for="iddivisi">Divisi:</label>
				<select name="iddivisi" id="iddivisi">
					<?php
					foreach ($divisi as $key => $value) {
						$selected = "";
						if ($value['id'] == $karyawan['iddivisi']) {
							$selected = "selected";
						}
						?>
						<option value="<?= $value['id'] ?>"<?= $selected ?>><?= $value['nama'] ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="form-group pull-right">
				<div class="col-sm-6">
					<input type="submit" class="btn btn-success" value="Simpan" id="submit" name="submit">
				</div>
			</div>
		</form>
	</div>
</main>
