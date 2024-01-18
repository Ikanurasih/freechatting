<html>
	<head>
		<title>Pertemanan</title>
	</head>
	<body>
		<form method="post" action="inputfoto.php" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Id Foto</td>
				<td>:</td>
				<td><input type="text" name="id" value="" required></td>
			</tr>
			<tr>
				<td>Id User</td>
				<td>:</td>
				<td><input type="text" name="user" value="" required></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td>:</td>
				<td><input type="file" name="foto" value="" accept="image/*" required></td>
			</tr>
			<tr>
				<td>Judul Foto</td>
				<td>:</td>
				<td><textarea name="judul" value="" cols="15" rows="3" required></textarea></td>
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
		$foto=$_FILES['foto']['name'];
		$query=insert("foto","id_foto,id_user,foto,judul_foto,tanggal","'$id','$user','$foto','$judul','$tanggal'");
		move_uploaded_file($_FILES['foto']['tmp_name'],"../images/".$foto);
		if($query){
			alert('Tersimpan');
		}
	}
?>