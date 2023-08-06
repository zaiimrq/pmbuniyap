<?php
    include "koneksi.php";

    session_start();
    if (!isset($_SESSION['loginAdm'])) {
      header("Location: login.php");
      exit;
    }


    if(isset($_POST['edit'])){
      $id = $_POST['id_jadwal'];
      $agenda = $_POST['agenda'];
      $periode_mulai = $_POST['periode_mulai'];
      $periode_akhir = $_POST['periode_akhir'];
      
    $sql = "UPDATE jadwal_pendaftaran SET id_jadwal='$id',agenda='$agenda',periode_mulai='$periode_mulai',periode_akhir='$periode_akhir' where id_jadwal=$id";
    $query = mysqli_query($conn,$sql);
    
    if($query){
    echo '<script>alert("Data Berhasil Diubah!");window.location.href="adm_jadwal.php"</script>';
    }else{
      echo '<script>alert("Data Gagal Diubah!");window.location.href="edit_jadwal.php"</script>';
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
    }
    
    .navbar-nav .nav-link:hover {
      color: yellow;
      /* Warna latar belakang ketika dihover */
    }
    .card{
      margin: 130px 0px;
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
    </nav>

  <div class="container">
    <div class="card">
        <div class="card-header" style="background-color: #f2c438;">
          Edit Data
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <?php 
              include "koneksi.php";
              if(isset($_GET['id_jadwal'])){
                $id = $_GET['id_jadwal'];
                $sql = "SELECT * FROM jadwal_pendaftaran WHERE id_jadwal=$id";
                $query = mysqli_query($conn,$sql);
                while ($data = mysqli_fetch_array($query)){
            ?>
            <div class="form-floating mb-3">
              <input type="hidden" class="form-control" name="id_jadwal" value="<?php echo $data['id_jadwal']?>" required id="id_jadwal" autocomplete="off">
            </div>

            <label for="agenda">Agenda</label>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="agenda" value="<?php echo $data['agenda']?>" required id="agenda" autocomplete="off">
            </div>

            <label for="periode_mulai">Periode Mulai</label>
            <div class="form-floating mb-3">
              <input type="date" class="form-control" name="periode_mulai" value="<?php echo $data['periode_mulai']?>" required id="periode_mulai" autocomplete="off">
            </div>

            <label for="periode_akhir">Periode Akhir</label>
            <div class="form-floating mb-3">
              <input type="date" class="form-control" name="periode_akhir" value="<?php echo $data['periode_akhir']?>" required id="periode_akhir" autocomplete="off">
            </div>
            <br> 
            <?php
                  }
                }
            ?>

            <div class="card-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
              <button type="submit" class="btn btn-success" name="edit" >Ubah Data</button>
            </div>
          </form>
        </div>
      </div>

  </div>

  <div class="footerbox col-md-12 text-white" style="padding: 40px 70px; background-color: #004d40;">
    <footer class="footer">
        <div class="ftr">
          <div class="row">
            <div class="col-lg-6">
              <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.9289176276047!2d140.71457037424182!3d-2.5301007382490392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686c582dc46936e3%3A0xae68a981d3dd7cbc!2sUniversitas%20YAPIS%20Papua%20(UNIYAP)%20Jayapura!5e0!3m2!1sid!2sid!4v1685886013348!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                <span class="text-muted">&copy;2023 PMB UNIYAP. All rights reserved.</span>
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
    $(document).ready(function() {
      $('.btn.btn-secondary').click(function() {
        document.location.href='adm_jadwal.php';
      })
    })
  </script>
</body>
</html>