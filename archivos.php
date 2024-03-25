<?php 
    //array para guardar los usuarios
    $usuarios = array();
    //si existe el archivo usuarios.json
    if(file_exists('usuarios.json')){
        $usuarios = json_decode(file_get_contents('usuarios.json'), true);
    }
    //si las variables nombre y apellido existen
    if(isset($_POST['nombre']) && isset($_POST['apellido'])){
        $nuevosUsuarios = array(
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido']
        );
        //agregar el nuevo usuario al array
        $usuarios[] = $nuevosUsuarios;
        //convertir el array a json
        $usuariosJson = json_encode($usuarios, JSON_PRETTY_PRINT);
        //guardar el json en el archivo usuarios.json
        file_put_contents('usuarios.json', $usuariosJson); 
        //mensaje de éxito
        echo 'Usuario registrado con éxito';

    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Genera tus reportes</title>
</head>
<body>

<!-- Formulario para generar reportes -->
<div class="container">
    <h1>Genera tus reportes</h1>
    <form action="reporte.php" method="POST">
        <label for="tipo">Tipo de reporte:</label>
        <select name="tipo" id="tipo">
            <option value="pdf">PDF</option>
            <option value="word">Word</option>
            <option value="excel">Excel</option>
        </select>
        <button type="submit" value="submit">Generar reporte</button>
    </form>
</div>
    
</body>
</html>