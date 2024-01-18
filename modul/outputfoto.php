<script type="text/javascript" src="../public/js/tanya.js"></script>
<table border="1">
	<tr>
		<th>ID Foto</th>
		<th>ID User</th>
		<th>Foto</th>
		<th>Judul Foto</th>
		<th>Tanggal Muat Foto</th>
		<th>Aksi</th>
	</tr>
<?php
	include "../lib/koneksi.php"; 
	include "../lib/fungsi.php"; 
	
	$query=query("select * from foto");
	$n=0;
	while($hasil=fetch($query)){
	$n++;
		?>
			<tr>
				<td><?=$n?></td>
				<td><?=$hasil['id_user']?></td>
				<td><img src="../images/<?=$hasil['foto']?>" width="75" height="75"></td>
				<td><?=$hasil['judul_foto']?></td>
				<td><?=$hasil['tanggal']?></td>
				<td>
					<a href="editfoto.php?edit=<?=$hasil['id_foto']?>"> Edit </a> - 
					<a href="outputfoto.php?hapus=hapus&id_foto=<?=$hasil['id_foto']?>" onclick="return hapus();"> Hapus </a>
				</td>
			</tr>
		<?php
	}
?>
</table>
<?php
	$hapus=isset($_GET['hapus'])?$_GET['hapus']:"";
	if($hapus=='hapus'){
		$id=isset($_GET['id_foto'])?$_GET['id_foto']:"";
		$delete="delete from foto where id_foto='$id'";
		query($delete);
	}
?>
