<?php
session_start();
session_destroy();

header("Location: index.php");
die();

// echo '<script>
//     var confirmation = confirm("Anda yakin ingin logout?");
//     if (confirmation) {
//       window.location = "login.php";
//     } else {
//       history.back();
//     }
//   </script>';
?>
