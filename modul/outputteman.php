<script type="text/javascript" src="../public/js/tanya.js"></script>
<table border="1">
	<tr>
		<th>ID Teman</th>
		<th>ID User</th>
		<th>Konfirmasi</th>
		<th>Aksi</th>
	</tr>
<?php
	include "../lib/koneksi.php";
	include "../lib/fungsi.php";
	
	$query=query("select * from teman");
	$n=0;
	while($hasil=fetch($query)){
	$n++;
		?>
			<tr>
				<td><?=$n?></td>
				<td><?=$hasil['id_user']?></td>
				<td><?=$hasil['konfirmasi']?></td>
				<td>
					<a href="editteman.php?edit=<?=$hasil['id_teman']?>">Edit</a> - 
					<a href="outputteman.php?hapus=hapus&id_teman=<?=$hasil['id_teman']?>" onclick="return hapus();"> Hapus </a>
				</td>
			</tr>
		<?php
	}
?>	
</table>
<?php
	$hapus=isset($_GET['hapus'])?$_GET['hapus']:"";
	if($hapus=='hapus'){
		$id=isset($_GET['id_teman'])?$_GET['id_teman']:"";
		$delete=query("delete from teman where id_teman='$id'");
		if($delete){
			
		}
	}
?>