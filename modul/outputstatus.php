<script type="text/javascript" src="../public/js/tanya.js"></script>
<table border="1">
	<tr>
		<th>ID Status</th>
		<th>ID User</th>
		<th>Isi Status</th>
		<th>Tanggal</th>
		<th>ID Komentar</th>
		<th>ID Teman</th>
		<th>Aksi</th>
	</tr>
<?php
	include "../lib/koneksi.php";
	include "../lib/fungsi.php";
	
	$query=query("select * from status");
	$n=0;
	while($hasil=fetch($query)){
	$n++;
		?>
			<tr>
				<td><?=$n?></td>
				<td><?=$hasil['id_user']?></td>
				<td><?=$hasil['isi_status']?></td>
				<td><?=$hasil['tanggal']?></td>
				<td><?=$hasil['id_komentar']?></td>
				<td><?=$hasil['id_teman']?></td>				
				<td>
					<a href="editstatus.php?edit=<?=$hasil['id_status']?>">Edit</a> - 
					<a href="outputstatus.php?hapus=hapus&id_status=<?=$hasil['id_status']?>" onclick="return hapus();"> Hapus </a>
				</td>
			</tr>
		<?php
	}
?>	
</table>
<?php
	$hapus=isset($_GET['hapus'])?$_GET['hapus']:"";
	if($hapus=='hapus'){
		$id=isset($_GET['id_status'])?$_GET['id_status']:"";
		$delete=query("delete from status where id_status='$id'");
		if($delete){
			
		}
	}
?>