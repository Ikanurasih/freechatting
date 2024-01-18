<?php
	include "../lib/koneksi.php";
	include "../lib/fungsi.php";
	
	if(isset($_GET['edit'])){
		$edit=isset($_GET['edit'])?$_GET['edit']:"";
		$query=query("select * from status where id_status='$edit'");
		while($hasil=fetch($query)){
			?>
				<form method="post" action="editstatus.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Id status</td>
					<td>:</td>
					<td><input type="hidden" name="id" value="<?=$hasil['id_status']?>" required><?=$hasil['id_status']?></td>
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
					<td>Id Komentar</td>
					<td>:</td>
					<td><input type="text" name="komentar" value="<?=$hasil['id_komentar']?>" required></td>
				</tr>
				<tr>
					<td>Isi status</td>
					<td>:</td>
					<td><textarea name="isi" value="<?=$hasil['isi_status']?>" cols="15" rows="3" required></textarea></td>
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
			$query=query("update status set id_user='$user',isi_status='$isi',tanggal='$tanggal',id_teman='$teman',id_komentar='$komentar' where id_status='$id'");
		if($query){
			alert('Terupdate', 'outputstatus.php');
		}
	}
?>