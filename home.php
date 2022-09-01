<header>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</header>
<?php

session_start();

if (!isset($_SESSION['usuario'])) {

  echo '<script>
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "¡You are not logged in!",
            showConfirmButton: true,
            }).then(function(result){
                if(result.value){                   
                window.location = "login.php";
                }
            });
  </script>';
  session_destroy();
  die();
}

$rol = $_SESSION['rol'];

if ($rol == 1) {
  echo '<script>
            Swal.fire({
            icon: "success",
            title: "Success",
            text: "¡Welcome Administrator!",
            showConfirmButton: true,
            }).then(function(result){
                if(result.value){                   
                window.location = "admin.php";
                }
            });
  </script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>BBank Admin</title>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="assets/css/estilosAdmin1.css">

</head>

<body>
<header>
        <nav>
            <a href="./index.html"><button class="logout-btn" >Logout</button></a>
            
        </nav>
    </header> 
  <script src="assets/js/scriptAdmin.js"></script>
</body>

</html>