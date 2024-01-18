<html>
	<head>
		<title>Pertemanan</title>
	</head>
	<body>
	<form action="inputpesan.php" method="post">
	<table>
		<tr>
			<td>Id Pesan</td>
			<td>:</td>
			<td><input type="text" name="pesan" value="" required></td>
		</tr>
		<tr>
			<td>Id User</td>
			<td>:</td>
			<td><input type="text" name="user" value="" required></td>
		</tr>
		<tr>
			<td>Id Teman</td>
			<td>:</td>
			<td><input type="text" name="teman" value="" required></td>
		</tr>
		<tr>
			<td>Pesan</td>
			<td>:</td>
			<td><textarea name="isi" value="" cols="16" rows="2" required></textarea></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><input type="date" name="tanggal" value="" required></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="simpan" value="Simpan"></td>
		</tr>
	</table>
	</form>
	</body>
</html>
<?php
	include "../lib/koneksi.php";
	include "../lib/fungsi.php";
	
	if(isset($_POST['simpan'])){
		extract($_POST);
		$query=insert("pesan","id_pesan,id_user,id_teman,isi_pesan,tanggal","'$pesan','$user','$teman','$isi','$tanggal'");
		if($query){
			alert('Tersimpan');
		}
	}
?>