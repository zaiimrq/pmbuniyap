<?php  

  include "koneksi.php";
  session_start();

  if (isset($_POST['login'])) {
  
    $nopen = $_POST['nopen'];
    $password = $_POST['password'];

    $nopen = stripcslashes($nopen);
    // $password = stripcslashes($password);
    $nopen = mysqli_real_escape_string($conn,$nopen);
    $password = mysqli_real_escape_string($conn,$password);

    $sql = "SELECT * FROM pendaftaran where no_pendaftar='$nopen'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
    

    if (mysqli_num_rows($query) === 0) {
      echo("<script>alert('Anda Belum Terdaftar !'); document.location.href='index.php';</script>");

      exit;
    } else {
      $hashed_password = $row["password"];
        if (password_verify($password, $hashed_password)) {
            $_SESSION['loginMhs'] = true;
            $_SESSION['nopen'] = $nopen;
            header("Location: mhs_page.php");
            exit;
        } else {
            echo("<script>alert('Password Salah!'); document.location.href='index.php';</script>");
            exit;
        }
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
   <!-- Link CSS Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-***" crossorigin="anonymous" />

  <!-- Link JavaScript Font Awesome (jika diperlukan) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-***" crossorigin="anonymous"></script>
  <style>
    /* Custom CSS */
    /* Add your custom styles here */

    :root {
      --hijau-primary: #004d40;
    }

    body {
    font-family: 'Open Sans', sans-serif;
    }



    .header-image {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
      background-color: #004d40;
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
      background-color: var(--hijau-primary);
    

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
      padding-top: 50px;
      color: #fff;
    }
    
    .header-content h1 {
      font-size: 40px;
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
      background-color: var(--hijau-primary);
      width: 50%;
      height: 100%;
      animation: fadep 1.5s .5s forwards;

    }

    .header-content .fade2::before {
      content: "";
      position: absolute;
      background-color: var(--hijau-primary);
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


    .header-content {
      flex: 1;
      padding-right: 20px;
      padding-left: 70px;
      padding-top: 40px;
      color: #fff;
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


    .card-title{
      color: #004d40;
      font-weight: bolder;
    }
    .row{
      margin: 30px 0;
    }
    .container{
      background-color: white;
      padding: 30px 0;
      margin-bottom: 50px;
    }
    .my-section{
      background-color: #f5f5f5;
      padding: 70px 0;
    }
    form{
      display: none;
    }

    .footerbox.col-md-12.text-white {
      padding: 40px 70px;
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

    @media screen and (max-width: 576px) {

      .footerbox.col-md-12.text-white {
        padding-right: 20px;
        padding-left: 20px;
      }
      
    }


  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="navbar-brand" href="#">
      <img src="img/logo.webp" alt="Universitas Logo">
    <div class="logo-text">
      <span>UNIVERSITAS</span>
      <span>YAPIS PAPUA</span>
    </div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fas fa-bars bg-white"></i></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Pendaftaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="prodi.php">Program Studi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#agenda">Agenda</a>
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


  <div class="container col-md-11">
            <div class="col-md-12">

              <div class="row">
                <div class="card col-sm-6 mb-3 mb-sm-0">
                <div class="card-header" style="background-color: #f2c438;">
                  <h5><i class="fas fa-globe"></i> Portal PMB UNIYAP</h5>
                  <p>Login untuk mengisi form pendaftaran:</p>
                  <button onclick="showForm('loginForm')" class="btn border-0 text-white" >Login</button>
                  <span>/</span>
                  <button onclick="showForm('registerForm')" class="btn border-0 text-white">Register</button>

                </div>
                <div class="card-body">
                  <form id="loginForm" action="" method="post">
                    <div class="form-group">
                      <label for="nopen">No Pendaftaran</label>
                      <input type="text" name="nopen" class="form-control" id="nopen" placeholder="Masukkan No Pendaftaran Anda">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                    </div>
                    <button type="submit" name="login" class="btn btn-success">Login</button>
                  </form>

                  <form id="registerForm" action="simpan.php" method="post">
                    <div class="form-group">
                        <label >Perhatian : Harap untuk mengingat <strong>No. Pendaftaran </strong>Anda yang akan digunakan untuk mengakses Login PMB UNIYAP.</label>
                        <label for="noPendaftaran">Nomor Pendaftaran</label>
                        <input type="text" name="noPendaftaran" class="form-control" id="noPendaftaran" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" name="nisn" class="form-control" id="nisn" placeholder="Masukkan Nisn">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email Anda">
                    </div>
                    <div class="form-group">
                        <label for="passReg">Password</label>
                        <input type="password" name="passReg1" class="form-control" id="passReg" placeholder="Masukkan Password Anda">
                    </div>
                    <div class="form-group">
                        <label for="passRegRepeat">Ulangi Password</label>
                        <input type="password" name="passReg2" class="form-control" id="passRegRepeat" placeholder="Ulangi Password Anda">
                    </div>
                    <button type="submit" name="daftar" class="btn btn-info">Daftar</button>

                  </form>
                   

                </div>
              </div>
              <br><br>

              <div class="card col-sm-6">
                <img src="img/illus.webp">
              </div>
            </div>

            <div class="card col-sm-12" id="agenda" style="margin-top: 70px; padding-right: 0; padding-left: 0;">
                <div class="card-header text-white" style="background-color: #004d40">
                  Agenda
                </div>
                <div class="card-body">
                  <?php 
                  include 'koneksi.php';
                  if ($conn-> connect_error) {
                        die("Koneksi Gagal:".$koneksi->connect_error);
                    }
                    $sql = "SELECT id_jadwal, agenda, periode_mulai, periode_akhir from jadwal_pendaftaran where id_jadwal=2";
                    $result = $conn-> query($sql);
                        $row = $result->fetch_assoc();
                        if ($row) {
                   ?>
                  <h5 class="card-title"><?php echo ($row['agenda']);?></h5>
                  <p class="card-text">Pendaftaran dibuka mulai tanggal <?php echo(date('d F Y', strtotime($row['periode_mulai']))); ?> sampai dengan <?php echo(date('d F Y', strtotime($row['periode_akhir'])));  }else{ echo "Tidak ada data";} mysqli_close($conn); ?> </p>
                </div>

              </div>

            <div class="my-section section">
              <center><h3 style="margin-bottom: 70px;">- Program Sarjana dan Pascasarjana -</h3></center>
              <div class="row">
              <div class="col-sm-5 mx-auto mb-3 mb-sm-0">
                <div class="card shadow text-center rounded p-4">
                  <div class="card-body ">
                    <h5 class="card-title"><i class="fas fa-university"></i> Kuota Program Sarjana (S-1)</h5> <hr>
                    <p class="card-text">Program Sarjana (S1) Semester Gasal dibuka untuk 11 program studi  dengan daya tampung <strong>500</strong></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-5 mx-auto">
                <div class="card shadow text-center rounded p-4">
                  <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-university"></i> Kuota Program Magister (S-2)</h5> <hr>
                    <p class="card-text">Program Magister (S2) Semester Gasal dibuka untuk 2 program studi  dengan daya tampung <strong>200</strong></p>
                  </div>
                </div>
              </div>
            </div>
            </div>

            <center><h3 style="margin: 70px 0; font-weight: bold;">-The Best Choice For The Future-</h3></center>

            <div class="row">
              <div class="col-sm-5 mx-auto mb-3 mb-sm-0">
                <div class="card shadow text-center rounded p-4">
                  <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-graduation-cap"></i> Program Studi Sarjana (S-1)</h5> <hr>
                    <p class="card-text">Memiliki 9 Program Studi dengan Akreditasi <strong>B</strong> <br> 2 Program Studi dengan Akreditasi <strong>Proses</strong>.</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-5 mx-auto">
                <div class="card shadow text-center rounded p-4">
                  <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-graduation-cap"></i> Program Studi Magister (S-2)</h5> <hr>
                    <p class="card-text">Memiliki 1 Program Studi dengan Akreditasi <strong>Baik</strong> <br> 1 Program Studi dengan Akreditasi <strong>B</strong>.</p>
                  </div>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.9289176276047!2d140.71457037424182!3d-2.5301007382490392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686c582dc46936e3%3A0xae68a981d3dd7cbc!2sUniversitas%20YAPIS%20Papua%20(UNIYAP)%20Jayapura!5e0!3m2!1sid!2sid!4v1685886013348!5m2!1sid!2sid"  width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
      strings: ['Selamat Datang <br> di UNIYAP','Penerimaan <br> Mahasiswa Baru'],
      typeSpeed: 100,
      backSpeed: 50,
      backDelay: 1000,
      loop: true
    });
  </script>

  <script>
    function showForm(formId) {
        if (formId === 'loginForm') {
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('registerForm').style.display = 'none';
        } else if (formId === 'registerForm') {
            document.getElementById('registerForm').style.display = 'block';
            document.getElementById('loginForm').style.display = 'none';
        }
    }


function generateNoPendaftaran() {
    var currentDate = new Date();
    var year = currentDate.getFullYear().toString();
    var randomDigits = Math.floor(Math.random() * 1000).toString().padStart(3, '0');

    var noPendaftaran = year + randomDigits;
    return noPendaftaran;
}

// Setel nilai nomor pendaftaran saat halaman dimuat
window.onload = function() {
    var noPendaftaranInput = document.getElementById('noPendaftaran');
    noPendaftaranInput.value = generateNoPendaftaran();
    showForm('loginForm');

};


</script>

</body>
</html>
