<?php 
    //comprueba si la variable tipo existe
    if(isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];
     //si el tipo es pdf, word o excel   
    if($tipo == 'pdf' || $tipo == 'word' || $tipo == 'excel'){
        //array para guardar los usuarios
        $usuarios = array();
        //si existe el archivo usuarios.json
        if(file_exists('usuarios.json')){
        $usuarios = json_decode(file_get_contents('usuarios.json'), true);
        }
        //si el tipo es pdf
        if($tipo == 'pdf'){
            //incluir la librería TCPDF
        require('vendor/autoload.php');
        $pdf = new TCPDF();
          //agregar una página
        $pdf->AddPage();
          //establecer el tipo de letra y tamaño
        $pdf->SetFont('times', 'B', 16);
          //agregar un título
        $pdf->Cell(40, 10, 'Reporte de usuarios');
          //agregar un salto de línea
        $pdf->Ln(10);
          //tipo de letra y tamaño
        $pdf->SetFont('times', 'B', 12);
          //recorrer el array de usuarios
        foreach($usuarios as $usuario){
            //agregar una celda
            $pdf->Cell(40, 10, 'Nombre: ' . $usuario['nombre']);
            //agregar un salto de línea
            $pdf->Ln(10);
            //agregar una celda
            $pdf->Cell(40, 10, 'Apellido: ' . $usuario['apellido']);
            //agregar un salto de línea
            $pdf->Ln(10);
        }
          //salida del pdf
        $pdf->Output();
          //si el tipo es word
        } else if($tipo == 'word'){
            //cabeceras para indicar que se descargará un archivo de word
        header("Content-type: application/vnd.ms-word");
          //cabeceras para indicar que se descargará un archivo
        header("Content-Disposition: attachment; filename=reporte.doc");
          //cabecera para indicar que se descargará un archivo
        echo '<html>'; 
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        echo '<body>';
          //título
        echo '<h2>Reporte de usuarios</h2>';
          //recorrer el array de usuarios
        foreach($usuarios as $usuario){
            //mostrar el nombre y apellido
            echo '<p>Nombre: ' . $usuario['nombre'] . '</p>';
            echo '<p>Apellido: ' . $usuario['apellido'] . '</p>';
        }
        echo '</body>';
        echo '</html>';
          //si el tipo es excel
        } else if($tipo == 'excel'){
            //cabeceras para indicar que se descargará un archivo de excel
        header("Content-Type: application/vnd.ms-excel");
          //cabeceras para indicar que se descargará un archivo
        header("Content-Disposition: attachment; filename=reporte.xls");
          //crear una tabla
        echo '<table>';
        echo '<tr>';
        echo '<th>Nombre</th>';
        echo '<th>Apellido</th>';
        echo '</tr>';
          //recorrer el array de usuarios
        foreach($usuarios as $usuario){
            //mostrar el nombre y apellido en una fila de la tabla
            echo '<tr>';
            echo '<td>' . $usuario['nombre'] . '</td>';
            echo '<td>' . $usuario['apellido'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        }

    }
    } 

    
?>