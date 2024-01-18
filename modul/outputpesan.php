<script type="text/javascript" src="../public/js/tanya.js"></script>
<table border="1">
	<tr>
		<th>ID pesan</th>
		<th>ID User</th>
		<th>ID teman</th>
		<th>Isi pesan</th>
		<th>Tanggal</th>
		<th>Aksi</th>
	</tr>
<?php
	include "../lib/koneksi.php";
	include "../lib/fungsi.php";
	
	$query=query("select * from pesan");
	$n=0;
	while($hasil=fetch($query)){
	$n++;
		?>
			<tr>
				<td><?=$n?></td>
				<td><?=$hasil['id_user']?></td>
				<td><?=$hasil['id_teman']?></td>
				<td><?=$hasil['isi_pesan']?></td>
				<td><?=$hasil['tanggal']?></td>
				<td>
					<a href="editpesan.php?edit=<?=$hasil['id_pesan']?>">Edit</a> - 
					<a href="outputpesan.php?hapus=hapus&id_pesan=<?=$hasil['id_pesan']?>" onclick="return hapus();"> Hapus </a>
				</td>
			</tr>
		<?php
	}
?>	
</table>
<?php
	$hapus=isset($_GET['hapus'])?$_GET['hapus']:"";
	if($hapus=='hapus'){
		$id=isset($_GET['id_pesan'])?$_GET['id_pesan']:"";
		$delete=query("delete from pesan where id_pesan='$id'");
		if($delete){
			
		}
	}
?>