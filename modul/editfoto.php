<?php
	include "../lib/koneksi.php";
	include "../lib/fungsi.php";
	
	if(isset($_GET['edit'])){
		$edit=isset($_GET['edit'])?$_GET['edit']:"";
		$query=query("select * from foto where id_foto='$edit'");
		while($hasil=fetch($query)){
			?>
				<form method="post" action="editfoto.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Id Foto</td>
					<td>:</td>
					<td><input type="hidden" name="id" value="<?=$hasil['id_foto']?>" required><?=$hasil['id_foto']?></td>
				</tr>
				<tr>
					<td>Id User</td>
					<td>:</td>
					<td><input type="text" name="user" value="<?=$hasil['id_user']?>" required></td>
				</tr>
				<tr>
					<td>Foto</td>
					<td>:</td>
					<td>
					<img src="../images/<?=$hasil['foto']?>" height="70" width="68"><br>
					<input type="file" name="foto" value="<?=$hasil['foto']?>" accept="image/*"></td>
				</tr>
				<tr>
					<td>Judul Foto</td>
					<td>:</td>
					<td><textarea name="judul" value="<?=$hasil['judul_foto']?>" cols="15" rows="3" required></textarea></td>
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
		$foto=$_FILES['foto']['name'];
		if(empty($foto)){
			$query=query("update foto set id_user='$user',judul_foto='$judul',tanggal='$tanggal' where id_foto='$id'");
		}else if(!empty($foto)){
			move_uploaded_file($_FILES['foto']['tmp_name'],"../images/".$foto);
			$query=query("update foto set id_user='$user',foto='$foto',judul_foto='$judul',tanggal='$tanggal' where id_foto='$id'");
		}
		if($query){
			alert('Terupdate', 'outputfoto.php');
		}
	}
?>