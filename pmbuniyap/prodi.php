<?php  

  include "koneksi.php";
  session_start();
 

  if (isset($_POST['login'])) {
  
    $nopen = $_POST['nopen'];
    $password = $_POST['passLog'];
    $nopen = stripcslashes($nopen);
    $nopen = mysqli_real_escape_string($conn, $nopen);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE no_pendaftar='$nopen' ");
    $row = mysqli_fetch_assoc($sql);
   
    if (mysqli_num_rows($sql) === 0) {
      echo("<script>alert('Anda Belum Terdaftar !'); document.location.href='index.php';</script>");

      exit;
    } else {
      $password = password_verify($password, $row["password"]);
      if ($password) {
        $_SESSION['login'] = true;
        header("Location: prodi.php");
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
      background-color: var(--hijau-primary);
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
      width: calc(100% + 10px); /* Adjust the value as needed */
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
      background-color: #f5f5f5;
      padding: 30px 0;
      margin-bottom: 50px;
    }

    .footerbox.col-md-12.text-white {
      padding: 40px 70px;
    }


    @media screen and (max-width: 991px)  {
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

    



    .card {
      text-align: center;
      font-size: 25px;
      margin-bottom: 3%;
      margin-top: 4%;
      font-weight: 500;
      letter-spacing: 1.5px;
      box-shadow: 1px 1px 5px var(--hijau-secondary);
    }


    .card-body {
      animation: fade 1s forwards ;
      transition: 2s ease-in-out all;
      
    }

    @keyframes fade {
      0% {
        opacity: 0;
        transform: translateY(-20px);
      } 

      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    thead tr {
      background-color: var(--hijau-primary);
      color: #fff;
    }

    tbody tr:nth-child(even){
      background-color: var(--hijau-secondary);
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
      <span class="navbar-toggler-icon white"><i class="fas fa-bars bg-white"></i></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Pendaftaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="prodi.php" onclick=>Program Studi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./#agenda">Agenda</a>
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


  <div class="container" id="prodi">
    <div class="card">
  <div class="card-body">
    Daftar Program Studi Universitas Yapis Papua
  </div>
</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode</th>
      <th scope="col">Program Studi</th>
      <th scope="col">Fakultas</th>
      <th scope="col">Akreditasi</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
                <?php

                include_once 'koneksi.php';
                // $koneksi = mysqli_connect($con);
                if ($conn-> connect_error) {
                    die("Koneksi Gagal:".$koneksi->connect_error);
                }
                $sql = "SELECT kode_prodi, prodi, fakultas, akreditasi from prog_studi";
                $result = $conn-> query($sql);
                if ($result-> num_rows > 0) {
                    $i=1;
                    while ($row = $result-> fetch_assoc()) {
                    ?>
                    <tr>
                      <td><?php echo($i++) ?></td>
                      <td><?php echo($row['kode_prodi']) ?></td>
                      <td><?php echo($row['prodi']) ?></td>
                      <td><?php echo($row['fakultas']) ?></td>
                      <td><?php echo($row['akreditasi']) ?></td>
                    </tr>
                    <?php      
                    }
                }
                    
                mysqli_close($conn);

                ?>
            </tbody>
  </table>
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
                <span >&copy;2023 PMB UNIYAP. All rights reserved.</span>
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
      startDelay: 1500,
      loop: true
    });
  </script>

  <script>

    function generateNoPendaftaran() {
        var currentDate = new Date();
        var year = currentDate.getFullYear().toString();
        var randomDigits = Math.floor(Math.random() * 1000).toString().padStart(3, '0');

        var noPendaftaran = year + randomDigits;
        return noPendaftaran;
    }

    // Setel nilai nomor pendaftaran saat halaman dimuat
    window.onload = function() {
        var scroll = document.getElementById("prodi");
        scroll.scrollIntoView({ behavior: 'smooth'});
    };
</script>

</body>
</html>
