<?php  

  include "koneksi.php";
  session_start();

  if (isset($_SESSION['loginAdm'])) {
  	header("Location: admin.php");
  	exit;
  }
  

  if (isset($_POST['loginAdm'])) {
  
    $user = $_POST['user'];
    $password = $_POST['password'];

    $user = stripcslashes($user);
    $password = stripcslashes($password);
    $user = mysqli_real_escape_string($conn,$user);
    $password = mysqli_real_escape_string($conn,$password);

    $sql = "SELECT * FROM user where username='$user' and password='$password'";
    $query = mysqli_query($conn,$sql);
    $cek = mysqli_num_rows($query);
    

    if($cek){
      $_SESSION['loginAdm'] = true;
      header("Location: admin.php");
      exit;
      } else {
        echo '<script>alert("Maaf Username atau Password Anda Salah!");window.location.href="login.php"</script>';
      }


     


  }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - PMB UNIYAP</title>
  <link rel="icon" href="img/logo.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f1f5f9;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 150px;
      padding: 30px 20px;
      background-color: #ffff;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }
    .form-group label {
    }

    .form-group input[type="text"],
    .form-group input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group button[type="submit"] {
      width: 100%;
      padding: 8px;
      background-color: #004d40;
      border: none;
      color: #fff;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h5 class="text-center">Login for PMB UNIYAP</h5><hr>
    <form action="" method="POST">
      <div class="form-group">
        <label for="user">Username</label>
        <input type="text" id="user" name="user" placeholder="Masukkan username Anda" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password Anda" name="password" required>
      </div>
      <div class="form-group">
        <button type="submit" name="loginAdm">Login</button>
      </div>
    </form>
  </div>
</body>
</html>
