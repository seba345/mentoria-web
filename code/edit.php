<?php

require "util/conected.php";
$db =connectDB();


if (isset($_POST["actualizar"])){
    $id = $_GET['id'];
	$nombre = $_POST["nombre"];
	$usuario = $_POST["usuario"];
	$mail = $_POST["mail"];
	
    $sql ="UPDATE users SET full_name=:full_name, user_name=:user_name, email=:email 
    WHERE id = :id";
    

// stament
$stmt = $db->prepare($sql);

//foreach ($users as $user){   

    $stmt->bindParam(':full_name', $nombre);
    $stmt->bindParam(':user_name', $usuario);
    $stmt->bindParam(':email', $mail);
    $stmt->bindParam(':id', $id);
                               
    $stmt->execute();

//}
echo "Actualizado";
}
else{
	echo "no se ha enviado la informacion";
}

// Preparar la SELECT

 $id = $_GET['id'];
$sql1 ="SELECT id, full_name, user_name, email FROM users
WHERE id = :id";

// stament
$stmt1 = $db->prepare($sql1);
$stmt1->bindParam(':id', $id);

$stmt1->execute();

$user = $stmt1 -> fetch();

?>


<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <title>List of User</title>
   
  </head>
  <body class="d-flex flex-column h-100">
    
    <div class="container pt-4 pb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="#">HTML CRUD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Crear Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" >FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" >Help</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </nav>
    </div>
        
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>Edit User</h1>
            <form action="" method="POST">
                <div class="form-group">
        
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?=$user['full_name'] ?>" >
                    <label for="name">Usuario</label>
                    <input type="text" class="form-control" name="usuario" value="<?=$user['user_name'] ?>" >
                    <label for="name">Correo</label>
                    <input type="text" class="form-control" name="mail" value="<?=$user['email'] ?>" >
              
                    
                </div>
                <button type="submit" class="btn btn-primary" name="actualizar">Actualizar</button>
            </form>
        </div>
    </main>
      

    <a href="index.php"><button class="btn btn-outline-primary btn-sm">Volver inicio</button></a>
    <footer class="footer mt-auto py-3">
        <div class="container pb-5">
            <hr>
            <span class="text-muted">
            Copyright &copy; 2021 | <a href="https://segic.cl">segic.com</a>
            </span>
        </div>
    </footer>

    
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>