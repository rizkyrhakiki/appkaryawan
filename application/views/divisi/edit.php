<h3>Tambah Divisi</h3>
<?php echo validation_errors(); ?>

<form action="<?= base_url('divisi/edit_save')?>" method="post">
	<input type="text" name="id" value="<?= $divisi['id'] ?>" hidden >
	<div>
		<label for="Kode">Kode :</label>
		<input type="text" value="<?= $divisi['kode'] ?>" name="kode"  required >
	</div>
	<div>
		<label for="Nama">Nama :</label>
		<input type="text" value="<?= $divisi['nama'] ?>" name="nama" required>
	</div>
	<div>
		<input type="submit"  value="submit">
	</div>
</form>
