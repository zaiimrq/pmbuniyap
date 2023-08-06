<?php 
	include "koneksi.php";
	session_start();
	if (!isset($_SESSION['loginAdm'])) {
	    header("Location: login.php");
	    exit;
	  }

	if(isset($_GET['id_jadwal'])){
		$id = $_GET['id_jadwal'];
	
	$sql = "DELETE FROM jadwal_pendaftaran where id_jadwal=$id";
	$query = mysqli_query($conn,$sql);
	
	if($query){
		echo '<script>alert("Data Berhasil Dihapus!");window.location.href="adm_jadwal.php"</script>';
		}else{
			echo '<script>alert("Data Gagal Dihapus!");window.location.href="adm_jadwal.php"</script>';
			}
		
	}
	?>