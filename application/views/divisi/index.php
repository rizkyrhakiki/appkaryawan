<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h3>Data Divisi</h3>

<table class="table table-striped">
	<a class="btn btn-primary pull-right" href="<?= base_url('divisi/tambah') ?>">Tambah</a>
	<tr>
		<th>Kode</th>
		<th>Nama</th>
		<th>Aksi</th>
	</tr>
	<?php foreach ($records as $key => $data){
		?>
	<tr>
		<td><?= $data['kode']?></td>
		<td><?= $data['nama']?></td>
		<td>
			<a class="btn btn-small btn-primary" href="<?= base_url('divisi/detail') ?>/<?= $data['id'] ?>">Detail</a>
			<a class="btn btn-small btn-warning" href="<?= base_url('divisi/edit') ?>/<?= $data['id'] ?>">Edit</a>
			<a onclick="return confirm('Hapus data?')" class="btn btn-small btn-danger" href="<?= base_url('divisi/hapus') ?>/<?= $data['id'] ?>">Delete</a>

		</td>

	</tr>
	<?php
	}

	?>
</table>
