<?php
	include "../lib/koneksi.php";
	include "../lib/fungsi.php";
	
	if(isset($_GET['edit'])){
		$edit=isset($_GET['edit'])?$_GET['edit']:"";
		$query=query("select * from pesan where id_pesan='$edit'");
		while($hasil=fetch($query)){
			?>
				<form method="post" action="editpesan.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Id pesan</td>
					<td>:</td>
					<td><input type="hidden" name="id" value="<?=$hasil['id_pesan']?>" required><?=$hasil['id_pesan']?></td>
				</tr>
				<tr>
					<td>Id User</td>
					<td>:</td>
					<td><input type="text" name="user" value="<?=$hasil['id_user']?>" required></td>
				</tr>
				<tr>
					<td>Id Teman</td>
					<td>:</td>
					<td><input type="text" name="teman" value="<?=$hasil['id_teman']?>" required></td>
				</tr>
				<tr>
					<td>Isi Pesan</td>
					<td>:</td>
					<td><textarea name="isi" value="<?=$hasil['isi_pesan']?>" cols="15" rows="3" required></textarea></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><input type="date" name="tanggal" value="<?=$hasil['tanggal']?>" required></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="update" value="Update"></td>
				</tr>
			</table>
			</form>
			<?php
		}
	}
	if(isset($_POST['update'])){
		extract($_POST);
			$query=query("update pesan set id_user='$user',id_teman='$teman',isi_pesan='$isi',tanggal='$tanggal' where id_pesan='$id'");
		if($query){
			alert('Terupdate', 'outputpesan.php');
		}
	}
?>