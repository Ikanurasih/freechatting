<?php
	include "../lib/koneksi.php";
	include "../lib/fungsi.php";
	
	if(isset($_GET['edit'])){
		$edit=isset($_GET['edit'])?$_GET['edit']:"";
		$query=query("select * from komentar where id_komentar='$edit'");
		while($hasil=fetch($query)){
			?>
				<form method="post" action="editkomentar.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Id komentar</td>
					<td>:</td>
					<td><input type="hidden" name="id" value="<?=$hasil['id_komentar']?>" required><?=$hasil['id_komentar']?></td>
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
					<td>Isi komentar</td>
					<td>:</td>
					<td><textarea name="isi" value="<?=$hasil['isi_komentar']?>" cols="15" rows="3" required></textarea></td>
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
			$query=query("update komentar set id_user='$user',id_teman='$teman',isi_komentar='$isi',tanggal='$tanggal' where id_komentar='$id'");
		if($query){
			alert('Terupdate', 'outputkomentar.php');
		}
	}
?>