<?php
  include 'koneksi.php';
  session_start();

  // Validasi form pendaftaran

   // if ( isset($_POST["daftar"])) {
                      
   //    }
   
  if(isset($_POST['daftar'])) {
    $noPendaftaran = $_POST['noPendaftaran'];
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['passReg1'];


    if ( !($_POST['passReg1'] === $_POST['passReg2'])) {
                        echo "<script>
                          alert('Password Anda Tidak Sesuai !');
                          document.location.href='./';
                        </script>
                        ";

                        die();

          };

    $pass = password_hash($password, PASSWORD_DEFAULT);

    // Lakukan validasi inputan tahap kedua (misalnya: cek keunikan nomor pendaftaran di database, dll.)
    // Jika validasi berhasil, simpan data pendaftaran ke database
    $queryCama = "INSERT INTO cama (nisn,nama, email,kode_prodi) VALUES ('$nisn', '$nama', '$email', NULL)";
    $queryPendaftaran = "INSERT INTO pendaftaran (no_pendaftar, nisn, password) VALUES ('$noPendaftaran','$nisn', '$pass')";
    
    $resultCama = mysqli_query($conn, $queryCama);
    $resultPendaftaran = mysqli_query($conn, $queryPendaftaran);

    if($resultCama && $resultPendaftaran) {
      // Pendaftaran berhasil, tampilkan pesan sukses atau lakukan tindakan lain
      $message = "Pendaftaran berhasil!";
      echo "<script type='text/javascript'>alert('$message');</script>";
      header("Location: index.php");
      exit;
    } else {
      // Pendaftaran gagal, tampilkan pesan error atau lakukan tindakan lain
      $message = "Pendaftaran gagal!";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
?>