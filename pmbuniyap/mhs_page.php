<?php
include_once 'koneksi.php';
session_start();

if (!isset($_SESSION['loginMhs'])) {
    header("Location: index.php");
    exit();
}

if(isset($_POST['formulir']))
{
    $nisn = $_POST['nisn'];
    $tlp = $_POST['tlp'];
    $thn_lulus = $_POST['thn_lulus'];
    $jalur = $_POST['jalur'];
    $asal = $_POST['asal'];
    $prodi = $_POST['prodi'];
  
    $query = "SELECT no_hp, thn_lulus, jalur_masuk, asal_sekolah, kode_prodi FROM cama WHERE nisn='$nisn'";
                 $result = mysqli_query($conn, $query);
                 $row = mysqli_fetch_assoc($result);
                 
      if (empty($row['no_hp'])) {
        $query = "UPDATE cama SET nisn=$nisn, no_hp='$tlp', thn_lulus='$thn_lulus',jalur_masuk='$jalur', asal_sekolah='$asal', kode_prodi='$prodi' WHERE nisn='$nisn'";
        $query_run=mysqli_query($conn, $query);
            if($query_run)
            {
                echo '<script>alert("Formulir Berhasil Terkirim!");window.location.href="mhs_page.php"</script>';
                exit();
            }
            else
            {
            echo '<script>alert("Formulir Gagal Terkirim!");window.location.href="mhs_page.php"</script>';
            }
        } else {
        echo "<script>alert('Anda sudah mengisi formulir');window.location.href='mhs_page.php'</script>";
        exit();
         }
    
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   <!-- Link CSS Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-*" crossorigin="anonymous" />

  <!-- Link JavaScript Font Awesome (jika diperlukan) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-*" crossorigin="anonymous"></script>
  <style>

    :root {
      --hijau: #004d40;
      --hijau-secondary: #8acf92;
    }

    body {
      font-family: 'Open Sans', sans-serif;
    }
      .header-image {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
      background-color: var(--hijau);
    }

    .header-image img{
      height: 400px;
      width:auto;
    }

    .header-banner {
      flex: 1;
      width: 60%;
      padding-right: 20px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      animation: imgFade 1s forwards ;
      position: relative;
    }

    .header-banner::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      transition: .7s ease-in all;
      cursor: pointer;
    }

    .header-banner:hover::before {
      opacity: .3;
      background-color: var(--hijau);
    

    }

    @keyframes imgFade {
       0% {
        opacity: 0;
        transform: translateX(60%);
       }

       100% {
        opacity: 1;
        transform: translateY(0);
       }
      
    }

    .header-banner img {
      width: 100%;
      height: 100%;
    }

    .header-content {
      flex: 1;
      padding-right: 20px;
      padding-left: 70px;
      color: #fff;
      padding-top: 50px;
    }
    
    .header-content h1 {
      font-size: 45px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    
    .header-content p {
      position: relative;
      font-size: 24px;
    }

    .header-content .fade1::before {
      content: "";
      position: absolute;
      background-color: var(--hijau);
      width: 50%;
      height: 100%;
      animation: fadep 1.5s .5s forwards;

    }

    .header-content .fade2::before {
      content: "";
      position: absolute;
      background-color: var(--hijau);
      width: 100%;
      height: 100%;
      animation: fadep 1s .7s forwards;

    }

    @keyframes fadep {
      0% {
        left: 0;      
      }
      100% {
        left: 100%;
        width: 0;
      }
      
    }


    .navbar {
      background-color: var(--hijau); /* Warna hijau tua */
    }
    
    .navbar-brand {
      display: flex;
      align-items: center;
      font-family: 'Montserrat', sans-serif;
      color: #fff; /* Warna teks putih */
      font-size: 16px;
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
      animation: linkFade 1.5s forwards;
    }


    @keyframes linkFade {
      0% {
        transform: translateX(100%);
        opacity: 0;
      }

      100% {
        transform: translateX(0);
        opacity: 1;
      }
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
    .row{
      margin: 30px 0;
    }
    .login{
      display: flex;
    }
    .container{
      margin-bottom: 70px;
    }
    input[readonly].field{
      background-color:transparent;
      border: 0;
      font-size: 1em;
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

    @media screen and (max-width: 991px)  {
        /*.header-banner {
          display: none;
        }*/
        .header-image {
          align-items: flex-end;
        }
        .header-content {
          padding-top: 100px;
        }

        .header-content p {
          font-size: 20px;
        }

        .header-content h1 {
          font-size: 40px;
        }
    }

    @media screen and (max-width: 756px) {
        .header-banner {
          display: none;
        }
    }

    @media screen and (max-width: 380px ) {
        .header-content {
          padding-right: 20px;
          padding-left: 20px;
        }

        .header-content h1 {
          font-size: 30px;
        }

        .header-content p {
          font-size: 18px;
        }


    }


  </style>
  </head>
  <body>
    <?php 
        
        $nopen = $_SESSION['nopen'];


        $query = "SELECT cama.* ,pendaftaran.no_pendaftar, prog_studi.prodi FROM cama JOIN pendaftaran ON cama.nisn=pendaftaran.nisn LEFT JOIN prog_studi ON cama.kode_prodi=prog_studi.kode_prodi WHERE pendaftaran.no_pendaftar='$nopen'  AND (cama.kode_prodi IS NULL OR cama.kode_prodi IS NOT NULL)";

        $rows = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($rows);
   

        
     ?>
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="navbar-brand" href="#">
        <img src="img/logo.webp" alt="Universitas Logo">
      <div class="logo-text">
        <span>UNIVERSITAS</span>
        <span>YAPIS PAPUA</span>
      </div>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon white"><i class="fas fa-bars bg-white"></i></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="mhs_page.php">Dashboard</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link" href="mhs_pengumuman.php?nisn=<?= $row['nisn']?>">Pengumuman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?')"><i class="fas fa-sign-out-alt fa-lg"></i> Logout</a>
          </li>
        </ul>
      </div>
    </nav>

  <!-- Content -->
  <div class="header-image">
    <div class="header-content">
      <h1><span id="element"></span></h1>
      <p class="fade1">UNIYAP 2023</p>
      <p class="fade2">"The Best Choice for the Future"</p>
    </div>
    <div class="header-banner"> 
      <img src="img/uniyappp.webp" alt="Header Image">
    </div>
  </div>


  <div class="container">
    
    <div class="card-box">
      <div class="card-body bg-warning shadow font-weight-bold">
        Selamat Datang <?= $row['nama']; ?> dengan No Pendaftaran <?= $row['no_pendaftar']; ?> sampai pada tahap
        <?php 
          $query_jadwal = "SELECT agenda from jadwal_pendaftaran where id_jadwal=2";
          $result_jadwal = $conn-> query($query_jadwal);
          $hasil = $result_jadwal->fetch_assoc();

          echo ($hasil['agenda']);
         ?> 
      </div>
    </div>

    <br><br>
    <div class="card col-md-12">
      <div class="card-header">
        Data Diri :
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="row mb-3">
            <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="nisn" value=": <?php echo($row['nisn']) ?>" readonly>
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="no_pendaftar" class="col-sm-2 col-form-label">No Pendaftaran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="no_pendaftar" value=": <?php echo($row['no_pendaftar']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="nama" value=": <?php echo($row['nama']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="email" value=": <?php echo($row['email']) ?>" readonly>
            </div>
          </div>

           <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">No Telepon</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="no_hp" value=": <?php echo($row['no_hp']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">Tahun Lulus</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="thn_lulus" value=": <?php echo($row['thn_lulus']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">Asal Sekolah</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="asal_sekolah" value=": <?php echo($row['asal_sekolah']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">Program Studi Pilihan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="jalur_masuk" value=": <?= $row['prodi'];?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">Jalur Seleksi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="jalur_masuk" value=": <?php echo($row['jalur_masuk']) ?>" readonly>
            </div>
          </div>


        </form>
      </div>
    </div>

     <!-- Modal -->
    <div class="modal fade" id="addSM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Formulir PMB UNIYAP 2023</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg" style="font-size: 1.5rem;"></i></button>
          </div>
          <div class="modal-body">


          <form action="" method="POST" >

            <label>NISN</label>
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" name="nisn" required id="nisn" value="<?= $row['nisn']; ?>" readonly>
             </div>

             <label>Nama</label>
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" name="nama" required id="nama" value="<?= $row['nama']; ?>" readonly>
             </div>

              <label>No Tlp</label>
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" name="tlp" required id="tlp" autocomplete="off">
             </div>

              <label>Email</label>
             <div class="form-floating mb-3">
                 <input type="email" class="form-control" name="email" required id="email" value="<?= $row['email']; ?>" readonly>
             </div>

            <label>Tahun Lulus</label>
            <div class="form-floating mb-3">
               <input type="number" class="form-control" name="thn_lulus" id="thn_lulus" min="2012" max="2023"  required>
           </div>

           <label for="jalur">Jalur Masuk</label>
                  <select name="jalur" class="form-control">
                    <option value="Mandiri">Mandiri</option>
                    <option value="Undangan">Undangan</option>
                </select>
                <br>

            <label for="prodi">Program Studi Pilihan</label>
                  <select name="prodi" class="form-control">
                  <?php 
                    // Mengambil data program studi dari database
                    $query_prodi = "SELECT * FROM prog_studi";
                    $result_prodi = mysqli_query($conn, $query_prodi);                    
                    while ($row_prodi = mysqli_fetch_assoc($result_prodi)) {
                    ?>
                    <option value="<?= $row_prodi['kode_prodi']; ?>"><?= $row_prodi['prodi'];?></option>
                  <?php } ?>
                </select>
                <br>

          <label>Asal Sekolah</label>
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" name="asal" required id="asal" autocomplete="off">
             </div>

            <br> 

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" style="width: 100px; float: left;" class="btn btn-success" name="formulir">Submit</button>
            </div>

            
          </form>
    
          </div>
          
        </div>
      </div>
    </div>

            <?php 

              if (isset($_POST['upload'])) {
                if (isset($_FILES['dok'])) {
                  $nisn = $row['nisn'];
                  $nama = $row['nama'];
                  $dokName = $_FILES['dok']['name'];
                  $dokTmp = $_FILES['dok']['tmp_name'];

              
                  $dokEx = explode('.', $dokName);
                  $dokEx = end($dokEx);
                  $dokName = $nisn.'-'.$nama.'.'.$dokEx;



                  if ($_FILES['dok']['error'] === 0) {
                    if ($dokEx === 'pdf') {
                      


                      $query = "SELECT nisn FROM dokumen WHERE nisn='$nisn'";
                      $result = mysqli_query($conn, $query);

                      if (mysqli_num_rows($result) > 0) {
                          $query = "UPDATE dokumen SET dokumen='$dokName' WHERE nisn='$nisn'";
                          mysqli_query($conn, $query);
                          move_uploaded_file($dokTmp, './doc/'.$dokName);

                      } else {
                        
                          $query = "INSERT INTO dokumen VALUES ('','$nisn','$dokName')";
                          mysqli_query($conn, $query);
                          move_uploaded_file($dokTmp, './doc/'.$dokName);

                      }
                  } else {
                    echo "
                          <script>
                                alert('Dokumen Yang Anda Pilih Bukan Pdf !');
                          </script>

                    ";  
                  }
                }
              }
            }

             ?>


     <!-- Modal -->
    <div class="modal fade" id="uploaddoc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Upload Dokumen PMB UNIYAP 2023</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg" style="font-size: 1.5rem;"></i></button>
          </div>
          <div class="modal-body">


          <form action="" method="POST" enctype="multipart/form-data">

            <label>Unggahlah Scan Ijazah atau Surat Keterangan Lulus(SKL) Anda dengan format .pdf. <br><br></label>
             <div class="form-floating mb-3">
                 <input type="file" class="form-control" name="dok" required id="doc">
             </div>

            <br> 

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" style="width: 100px; float: left;" class="btn btn-warning" name="upload">Upload</button>
            </div>

            
          </form>
    
          </div>
          
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6 mb-3 mb-sm-0 ">
        <div class="card bg-warning shadow">
          <div class="card-body">
            <h5 class="card-title font-weight-bold">Formulir PMB UNIYAP</h5>
            <p class="card-text">Calon Mahasiswa wajib mengisi seluruh data formulir dengan baik dan benar.</p>
            <a class="btn btn-success" id="tambahDataBtn" data-bs-toggle="modal" data-bs-target="#addSM">Isi Formulir</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card bg-info shadow">
          <div class="card-body">
            <h5 class="card-title font-weight-bold">Upload Dokumen</h5>
            <p class="card-text">Calon Mahasiswa wajib mengunggah dokumen Ijazah atau SKL(Surat Keterangan Lulus) dengan format .pdf</p>
            <a class="btn btn-warning" id="btnupload" data-bs-toggle="modal" data-bs-target="#uploaddoc">Upload</a>
          </div>
        </div>
      </div>
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
                <h3>Kontak Kami</h3><hr>
                <p>UNIT ADMISI</p>
                <p>Jl. Sam Ratulangi No.1 Jayapura 55281 Dok V Auditorium, Lantai 1</p>
                <p>Telp: +62-274 548811 (Jam Kerja 07.30 - 16.00 WIB)</p>
                <p>WA: 085158116006</p>
                <p>Mail: pmb@uniyap.ac.id</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="text-center text-white">
                <span>&copy;2023 PMB UNIYAP. All rights reserved.</span>
              </div>
            </div>
          </div>
        </div>
      </footer>
  </div>


  <!-- Typed Js -->
  <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    var typed = new Typed('#element', {
      strings: ['Selamat Datang <br> <?= $row['nama']; ?>'],
      typeSpeed: 100,
      backSpeed: 50,
      backDelay: 1000,
      loop: true
    });
  </script>

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

  <script>
  $(document).ready(function() {
    $('#uploaddoc').on('shown.bs.modal', function() {
      $(this).find('input:first').focus();
    });

    $('#btnupload').click(function() {
      $('#uploaddoc').modal('show');
    });

    $('.btn.btn-secondary').click(function() {
      $('#uploaddoc').modal('hide');
    });

    $('.btn-close').click(function() {
      $('#uploaddoc').modal('hide');
    });

    $('.btn-close').click(function() {
      $('#addSM').modal('hide');
    });
  });
</script>
</body>
</html>