<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulario archivos  PDF, word y excel</title>
</head>
<body>
<!-- Formulario para generar reportes -->
<div class="container">

    <h3>Registro de usuarios</h3>
    <br>
    <form action="archivos.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido"><br>
        <button type="submit" value="submit">Enviar</button>

    </form>

</div>

</body>
</html>