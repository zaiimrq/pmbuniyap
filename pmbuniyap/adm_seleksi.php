<?php 
include 'koneksi.php';
if ($conn->connect_error) {
die("Koneksi Gagal: " . $conn->connect_error);
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PMB - UNIYAP</title>
  <link rel="icon" href="img/logo.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
   <!-- Link CSS Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-***" crossorigin="anonymous" />

  <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
  <style>
    /* Custom CSS */
    /* Add your custom styles here */
    body {
    font-family: 'Open Sans', sans-serif;
    }
    .navbar {
      background-color: #004d40; /* Warna hijau tua */
    }
    
    .navbar-brand {
      display: flex;
      align-items: center;
      font-family: 'Montserrat', sans-serif;
      font-size: 16px;
      color: #fff; /* Warna teks putih */
    }

    .navbar-brand .logo-text {
      display: flex;
      flex-direction: column;
      margin-left: 20px; 
    }
    
    .navbar-brand img {
      max-height: 40px; 
      height: auto;
    }

    .navbar-nav .nav-link {
      color: #fff; /* Warna teks putih */
    }
    
    .navbar-nav .nav-link:hover {
      color: yellow;
      /* Warna latar belakang ketika dihover */
    }
    .nav-link {
      position: relative;
    }

    .nav-link::after {
      content: "";
      position: absolute;
      bottom: -5px;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 4px;
      background-color: yellow;
      transition: width 0.5s ease;
      visibility: hidden;
    }

    .nav-link:hover::after {
      width: calc(100% + 20px); /* Adjust the value as needed */
      visibility: visible;
    }
    .container {
    margin-top: 150px; /* Jarak atas container dari navbar */
    margin-bottom: 80px; /* Jarak bawah container */
  }
    .table thead tr th{
      text-align: center;
    }

    .footerbox.col-md-12.text-white {
      padding: 40px 70px;
    }

     @media screen and (max-width: 576px) {

      .footerbox.col-md-12.text-white {
        padding-right: 20px;
        padding-left: 20px;
      }
      
    }


    tbody tr td:nth-child(7) {
      display: flex;
      justify-content: space-around;
    }

    tbody tr td a button {
      height: 100%;
    }
  </style>

  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="navbar-brand" href="#">
      <img src="img/logo.webp" alt="Universitas Logo">
    <div class="logo-text">
      <span>Universitas</span>
      <span>Yapis Papua</span>
    </div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fas fa-bars bg-white"></i></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adm_prodi.php">Program Studi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adm_jadwal.php">Jadwal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adm_dok.php">Dokumen</a>
        </li>
        <li class="nav-item mr-4">
          <a class="nav-link" href="adm_seleksi.php">Hasil Seleksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adm_logout.php" title="Logout" onclick="return confirm('Apakah Anda yakin ingin logout ?')"><i class="fas fa-sign-out-alt fa-lg"></i></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="table-responsive">
      <table id="tabelsm" class="table table-striped" style="width:100%; text-align: center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>No Pendaftaran</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th>Hasil</th>
                    <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT cama.nisn, cama.nama, cama.hasil_seleksi,pendaftaran.no_pendaftar,prog_studi.prodi FROM cama JOIN pendaftaran ON cama.nisn= pendaftaran.nisn JOIN prog_studi ON cama.kode_prodi=prog_studi.kode_prodi";
                $result = $conn-> query($sql);
                if ($result-> num_rows > 0) {
                    $i=1;
                    while ($row = $result-> fetch_assoc()) {
                    ?>
                    <tr>
                      <td><?php echo($i++) ?></td>
                      <td><?php echo($row['nisn']) ?></td>
                      <td><?php echo($row['no_pendaftar']) ?></td>
                      <td><?php echo($row['nama']) ?></td>
                      <td><?php echo($row['prodi']) ?></td>
                      <td><?php echo($row['hasil_seleksi']) ?></td>
                      <td><a href="aksi_hasil.php?lulus=<?= $row['nisn'];?>"><button class="btn btn-success"><i class="fas fa-check"></i>  Lulus</button></a>
                        <a href="aksi_hasil.php?tidaklulus=<?= $row['nisn'];?>"><button class="btn btn-danger"><i class="fas fa-times"></i>  Tidak Lulus</button></a></td>
                    </tr>
                    <?php      
                    }
                }
                    
                mysqli_close($conn);

                ?>
            </tbody>
            

        </table>
    </div>
      
  </div>

  <div class="footerbox col-md-12 text-white" style="background-color: #004d40;">
    <footer class="footer">
        <div class="ftr">
          <div class="row">
            <div class="col-lg-6">
              <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.9289176276047!2d140.71457037424182!3d-2.5301007382490392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686c582dc46936e3%3A0xae68a981d3dd7cbc!2sUniversitas%20YAPIS%20Papua%20(UNIYAP)%20Jayapura!5e0!3m2!1sid!2sid!4v1685886013348!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="contact-info">
                <h3><strong>Kontak Kami</strong></h3><hr>
                <p>UNIT ADMISI</p>
                <p>Jl. Sam Ratulangi No.1 Jayapura 55281 Dok V Auditorium, Lantai 1</p>
                <p>Telp: +62-274 548811 (Jam Kerja 07.30 - 16.00 WIB)</p>
                <p>WA: 085158116006</p>
                <p>Mail: pmb@uniyap.ac.id</p>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-12">
              <div class="text-center text-white">
                <span>&copy;2023 PMB UNIYAP. All rights reserved.</span class="text-muted">
              </div>
            </div>
          </div>
        </div>
      </footer>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>

  <script>
  $(document).ready(function() {
    $('#addSM').on('shown.bs.modal', function() {
      $(this).find('input:first').focus();
    });

    $('#tambahDataBtn').click(function() {
      $('#addSM').modal('show');
    });

    $('.btn.btn-secondary').click(function() {
      $('#addSM').modal('hide');
    });
  });
</script>

</body>

 <script>
        $(document).ready(function() {
        $('#tabelsm').DataTable({
          responsive: true
        });
    } );
   </script>

</html>
