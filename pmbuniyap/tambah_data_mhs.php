<?php 

	include_once 'koneksi.php';



	if(isset($_POST['submit']))
{
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $tlp = $_POST['tlp'];
    $email = $_POST['email'];
    $thn_lulus = $_POST['thn_lulus'];
    $jalur = $_POST['jalur'];
    $asal = $_POST['asal'];
    $prodi = $_POST['prodi'];
    $noPendaftaran = $_POST['noPendaftaran'];
    $password = $_POST['password'];

	$pass = password_hash($password, PASSWORD_DEFAULT);

    $dokName = $_FILES['dok']['name'];
    $dokTmp = $_FILES['dok']['tmp_name'];

    $dokName = explode('.', $dokName);
    $dokEx = end($dokName);
    $dokName = $nisn.'-'.$nama.'.'.$dokEx;

    if ($dokEx === 'pdf') {

    	// $query2 = "INSERT INTO cama(nisn, nama, no_hp, email, thn_lulus, jalur_masuk, asal_sekolah,kode_prodi) SELECT c.nisn, c.nama, c.no_hp, c.email, c.thn_lulus, c.jalur_masuk, c.asal_sekolah, p.no_pendaftar, p.password FROM cama c JOIN pendaftaran p ON c.nisn=p.nisn;";
    	$query2 = "INSERT INTO cama (nisn,nama,no_hp,email,thn_lulus,jalur_masuk,asal_sekolah,kode_prodi) VALUES ('$nisn','$nama','$tlp','$email','$thn_lulus','$jalur','$asal','$prodi')";
    	$query3 = "INSERT INTO pendaftaran (no_pendaftar,nisn,password) VALUES ('$noPendaftaran','$nisn','$pass')";
		$query_run2 = mysqli_query($conn, $query2);
		$query_run3 = mysqli_query($conn, $query3);

		if ($query_run2 && $query_run3) {
			$query1 = "INSERT INTO dokumen(id_dokumen,nisn,dokumen) VALUES (NULL,'$nisn','$dokName')";
			$query_run1 = mysqli_query($conn, $query1);
			if ($query_run1) {
				move_uploaded_file($dokTmp, './doc/'.$dokName);
		        $message = "Data Saved";
		        echo "<script type='text/javascript'>alert('$message');</script>";
				}else{
					$message2 = "Data Not Saved";
	        		echo "<script type='text/javascript'>alert('$message2');</script>";
				}
		}

    } else {
    	echo "<script>alert('Dokumen bukan pdf !'); document.Location.href='admin.php'</script>";
    }


    




}

 ?>