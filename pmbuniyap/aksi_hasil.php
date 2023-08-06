<?php
    	include "koneksi.php";
		if(isset($_GET['lulus'])){
			$id = $_GET['lulus'];
			
		$sql = "UPDATE cama SET hasil_seleksi='LULUS' where nisn='$id'";
		$query = mysqli_query($conn,$sql);
		
		if($query){
			header("Location:adm_seleksi.php");
		}else{
			echo '<script>alert("Data Gagal Diubah!");window.location.href="adm_seleksi.php"</script>';
			}
		}

		if(isset($_GET['tidaklulus'])){
			$id = $_GET['tidaklulus'];
			
		$sql = "UPDATE cama SET hasil_seleksi='TIDAK LULUS' where nisn='$id'";
		$query = mysqli_query($conn,$sql);
		
		if($query){
			header("Location:adm_seleksi.php");
		}else{
			echo '<script>alert("Data Gagal Diubah!");window.location.href="adm_seleksi.php"</script>';
			}
		}
	?>