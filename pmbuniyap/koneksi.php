<?php 

	// $host = "sql302.infinityfree.com";
	// $user = "epiz_34333116";
	// $db = "epiz_34333116_db_pmbuniyap";
	// $pass = "At38q0VB5qlndbV";
	
	$host = "localhost";
	$user = "root";
	$db = "db_pmbuniyap";
	$pass = "";

	$conn = mysqli_connect($host, $user, $pass, $db);
	if (!$conn) {
		echo "koneksi gagal";
		die;
	}


	


 ?>