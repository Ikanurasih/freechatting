<script type="text/javascript" src="../public/js/tanya.js"></script>
<table border="1">
	<tr>
		<th>ID Komentar</th>
		<th>ID User</th>
		<th>ID teman</th>
		<th>Isi Komentar</th>
		<th>Tanggal</th>
		<th>Aksi</th>
	</tr>
<?php
	include "../lib/koneksi.php";
	include "../lib/fungsi.php";
	
	$query=query("select * from komentar");
	$n=0;
	while($hasil=fetch($query)){
	$n++;
		?>
			<tr>
				<td><?=$n?></td>
				<td><?=$hasil['id_user']?></td>
				<td><?=$hasil['id_teman']?></td>
				<td><?=$hasil['isi_komentar']?></td>
				<td><?=$hasil['tanggal']?></td>
				<td>
					<a href="editkomentar.php?edit=<?=$hasil['id_komentar']?>">Edit</a> - 
					<a href="outputkomentar.php?hapus=hapus&id_komentar=<?=$hasil['id_komentar']?>" onclick="return hapus();"> Hapus </a>
				</td>
			</tr>
		<?php
	}
?>	
</table>
<?php
	$hapus=isset($_GET['hapus'])?$_GET['hapus']:"";
	if($hapus=='hapus'){
		$id=isset($_GET['id_komentar'])?$_GET['id_komentar']:"";
		$delete=query("delete from komentar where id_komentar='$id'");
		if($delete){
			
		}
	}
?>