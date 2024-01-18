<?php
	include "../lib/koneksi.php";
	include "../lib/fungsi.php";
	
	if(isset($_GET['edit'])){
		$edit=isset($_GET['edit'])?$_GET['edit']:"";
		$query=query("select * from teman where id_teman='$edit'");
		while($hasil=fetch($query)){
			?>
				<form method="post" action="editteman.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Id Teman</td>
					<td>:</td>
					<td><input type="hidden" name="id" value="<?=$hasil['id_teman']?>" required><?=$hasil['id_teman']?></td>
				</tr>
				<tr>
					<td>Id User</td>
					<td>:</td>
					<td><input type="text" name="user" value="<?=$hasil['id_user']?>" required></td>
				</tr>
				<tr>
					<td>Konfirmasi</td>
					<td>:</td>
					<td><input type="text" name="konfirmasi" value="<?=$hasil['konfirmasi']?>" required></td>
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
			$query=query("update teman set id_user='$user',konfirmasi='$konfirmasi' where id_teman='$id'");
		if($query){
			alert('Terupdate', 'outputteman.php');
		}
	}
?>