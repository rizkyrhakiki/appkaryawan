<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h3>Data Karyawan</h3>

<table class="table table-striped">
	<a class="btn btn-primary pull-right" href="<?= base_url('karyawan/tambah') ?>">Tambah</a>
	<tr>
		<th>Nama</th>
		<th>Email</th>
		<th>No Telepon</th>
		<th>Jabatan</th>
		<th>Jenis Kelamin</th>
		<th>Divisi</th>
		<th>Aksi</th>

	</tr>
	<?php foreach ($records as $key => $data){
		?>
		<tr>
			<td><?= $data['nama']?></td>
			<td><?= $data['email']?></td>
			<td><?= $data['telpon']?></td>
			<td><?= $data['jabatan']?></td>
			<td><?= $data['jeniskelamin']?></td>
			<td><?= $data['namadivisi'] ?><td>

				<a class="btn btn-small btn-primary" href="<?= base_url('karyawan/detail') ?>/<?= $data['id'] ?>">Detail</a>
				<a class="btn btn-small btn-warning" href="<?= base_url('karyawan/edit') ?>/<?= $data['id'] ?>">Edit</a>
				<a onclick="return confirm('Hapus data?')" class="btn btn-small btn-danger" href="<?= base_url('karyawan/hapus') ?>/<?= $data['id'] ?>">Delete</a>

			</td>

		</tr>
		<?php
	}

	?>
</table>
