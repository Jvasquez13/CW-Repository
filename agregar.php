<header>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</header>

<?php

$nombre = $_POST['name'];
$email = $_POST['email'];
$usuario = $_POST['username'];
$password = $_POST['clave'];
$rol = $_POST['rol'];
$status = $_POST['status'];

include('db.php');

$query = "INSERT INTO usuarios (nombre, email, usuario, password, rol, status) 
    VALUES ('$nombre', '$email', '$usuario', '$password', '$rol', '$status')";

$ejecutar = mysqli_query($conexion,$query);

if($ejecutar){
    echo '<script>
        Swal.fire({
        icon: "success",
        title: "Success",
        text: "User added successfully!",
        showConfirmButton: true,
        }).then(function(result){
            if(result.value){                   
            window.location = "create.php";
            }
        });
    </script>';
}else{
    echo '<script>
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "User not added!, try again!",
        showConfirmButton: true,
        }).then(function(result){
            if(result.value){                   
            window.location = "create.php";
            }
        });
    </script>';

}

mysqli_close($conexion);

?>