<header>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</header>
<?php

session_start();

$rol = $_SESSION['rol'];

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

if ($rol != 1) {
  echo '<script>
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "You not have permission to access this page!",
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>CW Repository</title>
  <link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="assets/css/estilosAdmin1.css">

</head>

<body>

<input type="checkbox" id="nav-toggle">
  <div class="sidebar">
    <div class="sidebar-brand">
      <h2><span class="las la-user-secret"><span>CW Repository</span></span></h2>
    </div>

    <div class="sidebar-menu">
      <ul>
        <li>
          <a href="admin.php" ><span class="las la-igloo"></span>
            <span>Dashboard</span></a>
        </li>
        <li>
          <a href="create.php" class="active"><span class="las la-user-plus"></span>
            <span>Create Users</span></a>
        </li>
        <li>
          <a href="users.php"><span class="las la-users"></span>
            <span>Users</span></a>
        </li>
        <li>
          <a href="createContent.php"><span class="las la-book-reader"></span>
            <span>Create Content</span></a>
        </li>
        <li>
          <a href="repository.php"><span class="las la-book"></span>
            <span>Repository</span></a>
        </li>
        <li>
          <a href="cerrar_session.php"><span class="las la-door-open"></span>
            <span>Logout</span></a>
        </li>
      </ul>
    </div>
  </div>

  <div class="main-content">
    <header>
      <h2>
        <label for="nav-toggle">
          <span class="las la-bars"></span>
        </label>

        Create Users
      </h2>

      <div class="user-wrapper">
        <img src="assets/images/adminIcon.png" width="30px" height="30px" alt="">
        <div>
          <h4><?php echo $_SESSION['nombre'];?></h4>
        </div>
      </div>
    </header>

    <main>

      <section class="container_admin">
        <img src="assets/images/cwlogo1.png" class="avatar" srcset="">

        <h1>User Registration</h1>
        <form action="agregar.php" method="POST">
          <div class="field">
            <input type="text" name="name" id="name" required>
            <span></span>
            <label>Full Name</label>
          </div>
          <div class="field">
            <input type="text" name="email" id="email" required>
            <span></span>
            <label>Email</label>
          </div>
          <div class="field">
            <input type="text" name="username" id="username" required>
            <span></span>
            <label>Username</label>
          </div>
          <div class="field">
            <input type="text" name="clave" id="clave" required>
            <span></span>
            <label>Password</label>
          </div>

          <label for='rol'>Choose rol:</label>
          <select name="rol" id="rol" required>
            <option value=""></option>
            <option value="1">Administrator</option>
            <option value="0">User</option>
          </select>
          <br>
          <label for="status">Choose status:</label>
          <select name="status" id="status" required>
            <option value=""></option>
            <option value="1">Active</option>
            <option value="0">Desactivate</option>
          </select>
          <input type="submit" class="btnRegistrar" value="Register" />
        </form>
      </section>

    </main>
    <script src="assets/js/scriptAdmin.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>