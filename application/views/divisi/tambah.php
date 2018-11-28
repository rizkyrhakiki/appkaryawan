<h3>Tambah Divisi</h3>
<?php echo validation_errors(); ?>

<form action="<?= base_url('divisi/tambah_save')?>" method="post">
	<div>
		<label for="Kode">Kode :</label>
		<input type="text" name="kode" required>
	</div>
	<div>
		<label for="Nama">Nama :</label>
		<input type="text" name="nama" required>
	</div>
	<div>
		<input type="submit"  value="submit">
	</div>
</form>
