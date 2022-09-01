<header>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</header>

<?php

$title = $_POST['title'];
$type = $_POST['type'];
$category = $_POST['category'];
$description = $_POST['description'];
$url = $_POST['url'];
$language = $_POST['language'];
$credits = $_POST['credits'];

include('db.php');

$query = "INSERT INTO repository (title, type, category, description, url, language, credits) 
VALUES ('$title', '$type', '$category', '$description', '$url', '$language', '$credits')";


$ejecutar = mysqli_query($conexion,$query);

if($ejecutar){
    echo '<script>
        Swal.fire({
        icon: "success",
        title: "Success",
        text: "Resource added successfully!",
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
        text: "Resource not added!, try again!",
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