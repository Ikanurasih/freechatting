<?php
	$server="localhost";
	$user="root";
	$password="";
	$db="db_chat";
	$kondisi=mysql_connect($server,$user,$password);
	if($kondisi){
		mysql_select_db($db);
	}else{
		echo " Koneksi gagal";
	}
?>