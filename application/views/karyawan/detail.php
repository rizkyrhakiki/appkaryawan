
<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php'
?>
<h3>Detail</h3>

<table class="table">
	<tr>
		<th>Nama Karyawan</th>
		<td><?= $karyawan['nama'] ?></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><?= $karyawan['email'] ?></td>
	</tr>
	<tr>
		<th>Telpon</th>
		<td><?= $karyawan['telpon'] ?></td>
	</tr>
	<tr>
		<th>Jabatan</th>
		<td><?= $karyawan['jabatan'] ?></td>
	</tr>
	<tr>
		<th>Jenis Kelamin</th>
		<td><?= $karyawan['jeniskelamin'] ?></td>
	</tr>
	<tr>
		<th>Divisi</th>
		<td><?= $karyawan['namadivisi'] ?></td>
	</tr>
	<tr>
		<th>Foto</th>
		<td><img style="width: 50px" src="<?= BASE_ASSETS ?>/uploads/<?= $karyawan['foto'] ?>" alt="boy"></td>
	</tr>
</table>
