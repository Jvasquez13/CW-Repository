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


<?php
include('db.php');


$sql = "SELECT * from repository";

$resultado = $conexion->query($sql);


$numero = mysqli_num_rows($resultado);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>CW Repository</title>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="assets/css/users.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,regular,500,600,700,800,300italic,italic,500italic,600italic,700italic,800italic" rel="stylesheet" />

</head>

<body>
    <header>
        <nav>
            <a href="./cerrar_session.php"><button class="logout-btn" >Logout</button></a>
        </nav>
    </header> 

    <div class ="table-container">
      <h1 class="heading"> Educational Resources</h1>
      <table id="datatableid" class ="table">
        <thead>
          <tr>
            <th>Title Resource</th>
            <th>Type Resource</th>
            <th>Category</th>
            <th>Description</th>
            <th>URL</th>
            <th>Language</th>
            <th>Credits</th>
          </tr>
        </thead>
        <tbody>
        
<?php
  while($encontrados = mysqli_fetch_assoc($resultado)){
?>

        <tr>
          <td data-label =""><?php echo $encontrados['title']?></td>
          <td><?php echo $encontrados['type']?></td>
          <td><?php echo $encontrados['category']?></td>
          <td><?php echo $encontrados['description']?></td>
          <td><a href="<?php echo $encontrados['url']?>"><?php echo $encontrados['url']?></a></td>
          <td><?php echo $encontrados['language']?></td>
          <td><?php echo $encontrados['credits']?></td>                            
        </tr>
        <?php
          }
        ?>
        </tbody>
      </table>        
    </div>
    
<script src="assets/js/scriptAdmin.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function () {

    $('#datatableid').DataTable();

});
</script>
</body>

</html>