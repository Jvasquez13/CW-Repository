<header>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</header>

<?php

    $email = $_POST["email"];
    $password = $_POST["password"];


    session_start();
    

    include('db.php');

    $consulta = "SELECT id, nombre, email, usuario, rol, status FROM usuarios where email = '$email' and password = '$password'";
    $resultado =mysqli_query($conexion,$consulta);
    $filas= mysqli_num_rows($resultado);


    if($filas > 0){
        $row = $resultado ->fetch_assoc();

        $_SESSION['id'] = $row['id'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['rol'] = $row['rol'];
        $_SESSION['status'] = $row['status'];
      
    }
    if($_SESSION['status'] == 1){

        echo '<script>
                Swal.fire({
                icon: "success",
                title: "Welcome",
                text: "Welcome to CW Repository",
                showConfirmButton: true,
                }).then(function(result){
                    if(result.value){                   
                    window.location = "Home.php";
                    }
                });
            </script>';
        exit();
    }
    else{

        echo '<script>
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Check your credentials!, and try again!",
            showConfirmButton: true,
            }).then(function(result){
                if(result.value){                   
                window.location = "login.php";
                }
            });
        </script>';
        exit();
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);


?>
