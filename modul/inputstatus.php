<html>
	<head>
		<title>Pertemanan</title>
	</head>
	<body>
	<form action="inputstatus.php" method="post">
	<table>
		<tr>
			<td>Id status</td>
			<td>:</td>
			<td><input type="text" name="status" value="" required></td>
		</tr>
		<tr>
			<td>Id User</td>
			<td>:</td>
			<td><input type="text" name="user" value="" required></td>
		</tr>
		<tr>
			<td>Id Komentar</td>
			<td>:</td>
			<td><input type="text" name="komentar" value="" required></td>
		</tr>
		<tr>
			<td>Id Teman</td>
			<td>:</td>
			<td><input type="text" name="teman" value="" required></td>
		</tr>
		<tr>
			<td>Status</td>
			<td>:</td>
			<td><textarea name="isi" value="" cols="17" rows="2" required></textarea></td>
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
		$query=insert("status","id_status,id_user,isi_status,tanggal,id_komentar,id_teman","'$status','$user','$isi','$tanggal','$komentar','$teman'");
		if($query){
			alert('Tersimpan');
		}
	}
?>