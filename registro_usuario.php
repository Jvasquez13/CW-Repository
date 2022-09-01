<header>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</header>

<?php

    include 'db.php';

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $rol = 0;
    $status = 1;

    $query = "INSERT INTO usuarios (nombre, email, usuario, password, rol, status) 
    VALUES ('$nombre', '$email', '$usuario', '$password', '$rol', '$status')";

    //verificar que el correo no se repita en la base de datos

    $verificarCorreo = mysqli_query($conexion,"SELECT * FROM usuarios WHERE email = '$email'");
    $verificarUsuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usuario'");

    if (mysqli_num_rows($verificarCorreo) > 0){

        echo '<script>
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Email have been registered!, try with another one!",
            showConfirmButton: true,
            }).then(function(result){
                if(result.value){                   
                window.location = "login.php";
                }
            });
        </script>';
        exit();

    }
    if (mysqli_num_rows($verificarUsuario) > 0){

        echo '<script>
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Username have been registered!, try with another one!",
        showConfirmButton: true,
        }).then(function(result){
            if(result.value){                   
            window.location = "login.php";
            }
        });
    </script>';
        exit();
    }
    

    $ejecutar = mysqli_query($conexion,$query);

    if($ejecutar){
        echo '<script>
            Swal.fire({
            icon: "success",
            title: "Success",
            text: "User registered successfully!",
            showConfirmButton: true,
            }).then(function(result){
                if(result.value){                   
                window.location = "login.php";
                }
            });
        </script>';
    }else{
        echo '<script>
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Try again! User not registered!",
            showConfirmButton: true,
            }).then(function(result){
                if(result.value){                   
                window.location = "login.php";
                }
            });
        </script>';

    }

    mysqli_close($conexion);
?>