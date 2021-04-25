<?php

$dbname = "registro";
$dbuser = "admin";
$dbpassword = "user1";

try {
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $db = new PDO($dsn, $dbuser, $dbpassword);
    echo "Correcto";

} catch (PDOException $e) {
    echo $e->getMessage();
}



$sql ="SELECT id, full_name, user_name, email
       FROM users";
// stament
$stmt = $db->prepare($sql);

$stmt->execute();


$users = $stmt -> fetchAll(PDO::FETCH_ASSOC);

echo '<table border="1">
        <tr>
            <th>ID</th>
            <th>NOMBRE COMPLETO</th>
            <th>USUARIO</th>
            <th>CORREO</th>
        </th>';
            
foreach ($users as $user) {
    echo '<tr>
            <th>' .$user['id']. '</th>
            <th>' .$user['full_name']. '</th>
            <th>' .$user['user_name']. '</th>
            <th>' .$user['email']. '</th>
          </th>';
};
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

    <title>Listado Usuarios</title>
   
  </head>
  <body class="d-flex flex-column h-100">
    
    <div class="container pt-4 pb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="#">HTML CRUD Template</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.html">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://pisyek.com/contact">Help</a>
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
            <h1>Listado de Usuarios</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                        <a href="view.html"><button class="btn btn-primary btn-sm">View</button></a>
                        <a href="edit.html"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                        <button class="btn btn-sm">Delete</button>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>
                        <a href="view.html"><button class="btn btn-primary btn-sm">View</button></a>
                        <a href="edit.html"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                        <button class="btn btn-sm">Delete</button>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>
                        <a href="view.html"><button class="btn btn-primary btn-sm">View</button></a>
                        <a href="edit.html"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                        <button class="btn btn-sm">Delete</button>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
      
    <footer class="footer mt-auto py-3">
        <div class="container pb-5">
            <hr>
            <span class="text-muted">
                    Copyright &copy; 2019 | <a href="https://pisyek.com">Pisyek.com</a>
            </span>
        </div>
    </footer>

    
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>