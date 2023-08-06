<?php 
	include "koneksi.php";
	session_start();
	if (!isset($_SESSION['loginAdm'])) {
	    header("Location: login.php");
	    exit;
	  }
	  
	if(isset($_GET['kode_prodi'])){
		$id = $_GET['kode_prodi'];
	
	$sql = "DELETE FROM prog_studi where kode_prodi=$id";
	$query = mysqli_query($conn,$sql);
	
	if($query){
		echo '<script>alert("Data Berhasil Dihapus!");window.location.href="adm_prodi.php"</script>';
		}else{
			echo '<script>alert("Data Gagal Dihapus!");window.location.href="adm_prodi.php"</script>';
			}
		
	}
	?>