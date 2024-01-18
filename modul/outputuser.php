<script type="text/javascript" src="../public/js/tanya.js"></script>
<table border="1">
	<tr>
		<th>ID user</th>
		<th>Nama Depan</th>
		<th>Nama Belakang</th>
		<th>username</th>
		<th>Password</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal Lahir</th>
		<th>Foto</th>
		<th>Alamat</th>
		<th>Aksi</th>
	</tr>
<?php
	include "../lib/koneksi.php"; 
	include "../lib/fungsi.php"; 
	
	$query=query("select * from user");
	$n=0;
	while($hasil=fetch($query)){
	$n++;
		?>
			<tr>
				<td><?=$n?></td>
				<td><?=$hasil['nama_depan']?></td>
				<td><?=$hasil['nama_belakang']?></td>
				<td><?=$hasil['username']?></td>
				<td><?=$hasil['password']?></td>
				<td><?php
					$jk=$hasil['jk'];
					switch($jk){
						case 'p':
						echo "Perempuan";
						break;
						case 'l':
						echo "Laki-Laki";
						break;
					}
				?></td>
				<td><?=$hasil['tanggal_lahir']?></td>
				<td><img src="../galeri/<?=$hasil['foto']?>" width="75" height="75"></td>
				<td><?=$hasil['alamat']?></td>
				<td>
					<a href="edituser.php?edit=<?=$hasil['id_user']?>"> Edit </a> - 
					<a href="outputuser.php?hapus=hapus&id_user=<?=$hasil['id_user']?>" onclick="return hapus();"> Hapus </a>
				</td>
			</tr>
		<?php
	}
?>
</table>
<?php
	$hapus=isset($_GET['hapus'])?$_GET['hapus']:"";
	if($hapus=='hapus'){
		$id=isset($_GET['id_user'])?$_GET['id_user']:"";
		$delete="delete from user where id_user='$id'";
		query($delete);
	}
?>
