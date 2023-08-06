<?php 
	include "koneksi.php";

	session_start();
	if (!isset($_SESSION['loginAdm'])) {
	    header("Location: login.php");
	    exit;
	  }


	if(isset($_GET['nisn'])){
		$id = $_GET['nisn'];
	
	$sql = "DELETE FROM cama WHERE nisn=$id";
	$query = mysqli_query($conn,$sql);
	
	if($query){
		echo '<script>window.location.href="admin.php"</script>';
		}else{
			echo '<script>alert("Data Gagal Dihapus!");window.location.href="admin.php"</script>';
			}
		
	}
	?>