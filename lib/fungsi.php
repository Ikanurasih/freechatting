<?php
	function query($run){
		$query=mysql_query($run) or die(mysql_error());
		return $query;
	}
	function num($run){
		return mysql_num_rows($run);
	}
	function fetch($run){
		return mysql_fetch_array($run);
	}
	function insert($table,$field,$values){
		$query=query("insert into $table ($field) values ($values)");
		return $query;
	}
	function pilih($table,$field,$kondisi){
		$query=query("select * from $table order by $field $kondisi");
		return $query;
	}
	function select($table,$field,$add=""){
		$query=query("select $field from $table $add");
		$post=array();
		while($hasil=fetch($query)){
			$post[]=$hasil;
		}
		return $post;
	}
	function update($table,$set,$kondisi){
		$query=query("update $table set $set $kondisi");
		return $query;
	}
	function paging($halke,$perhal){
		empty($halke)?$halke=1:"";
		$offset=($halke-1)*$perhal;
		$limit=" limit $offset,$perhal";
		return $limit;
	}
	function nav($url,$halke,$perhal,$total){
		empty($halke)?$halke=1:"";
		$jumlah=ceil($total/$perhal);
		if($halke>0){
			echo "<a href='$url&halke=1'>Awal</a>";
		}
		for($nohal=1;$nohal<=$jumlah;$nohal++){
			if($nohal==$halke){
				echo "<span>$nohal</span>";
			}else{
				echo "<a href='$url&halke=$nohal'>$nohal</a>";
			}
		}
		if($halke>1){
			echo "<a href='$url&halke=$jumlah'>Akhir</a>";
		}
	}
	function delete($table,$kondisi=""){
		$query=query("delete from $table $kondisi");
		return $query;
	}
	function bulan($b){
		$nama=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		return $nama[$b];
	}
	function alert($pesan,$lokasi){
		echo "
			<script>alert('$pesan');
				location.href='$lokasi';
			</script>
		";
	}
	
?>