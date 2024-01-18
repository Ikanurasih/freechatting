<html>
	<head>
		<title>Pertemanan</title>
	</head>
	<body>
	<form action="inputteman.php" method="post">
	<table>
		<tr>
			<td>Id teman</td>
			<td>:</td>
			<td><input type="text" name="teman" value="" required></td>
		</tr>
		<tr>
			<td>Id User</td>
			<td>:</td>
			<td><input type="text" name="user" value="" required></td>
		</tr>
		<tr>
			<td>Konfirmasi</td>
			<td>:</td>
			<td><select name="konfirmasi" required>
				<option value="ya">Ya</option>
				<option value="tidak">Tidak</option>
			</select></td>
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
		$query=insert("teman","id_teman,id_user,konfirmasi","'$teman','$user','$konfirmasi'");
		if($query){
			alert('Tersimpan');
		}
	}
?>