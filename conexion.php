<?php
//se define el uso horario para la aplicación en caso de que difiera de la hora del servidor
date_default_timezone_set('America/Bogota');  

    
//parámetros conexión DB
    $nombre_server = 'localhost';       //Servidor al cual nos vamos a conectar.
    $nombre_user = 'user';  //Usuario de la base de datos.
    $password = 'pwd';        //Contraseña del user de base de datos.
    $nombre_db = 'dbname';       //Nombre de la base de datos
    
    $conectar  = @mysqli_connect($nombre_server,$nombre_user,$password,$nombre_db) or exit('Datos de conexion incorrectos.');

//funciones 
function show_head($title){
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "    <meta charset='utf-8'>";
    echo "    <link href='estilos/bootstrap.min.css' rel='stylesheet'>";
    echo "    <title>".$title."</title>";
    echo "</head>";
    echo "<body>";

    echo "<header>";
    echo "    <h1>".$title."</h1>";
    echo "</header>";
}

function show_footer(){
    	echo "<footer>";
		echo "<p>Desarrollado por <a href='https://twitter.com/santiaguf'>Santiago Bernal</a></p>";
	    echo "</footer>";
}

function listar_municipios(){
    echo "<table class='table table-striped table-bordered'>"; 
    echo "<tr>"; 
    echo "<td><b>Id</b></td>"; 
    echo "<td><b>Nombre municipio</b></td>"; 
    echo "<td><b>Cantidad habitantes</b></td>";
    echo "<td><b>Opciones</b></td>";
    echo "<td></td>";
    echo "</tr>"; 
        //consultamos los datos
        $querylistar = "SELECT * FROM municipios";
        $result = mysqli_query($GLOBALS["conectar"], $querylistar) or trigger_error(mysqli_error($GLOBALS["conectar"]));
    while($row = mysqli_fetch_array($result)){ 
        foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
        echo "<tr>";  
        echo "<td valign='top'>" . nl2br( $row['id_municipio']) . "</td>";  
        echo "<td valign='top'>" . nl2br( $row['nombre_municipio']) . "</td>";  
        echo "<td valign='top'>" . nl2br( $row['poblacion']) . "</td>";
        echo "<td valign='top'><a href=editar.php?id_municipio={$row['id_municipio']} class='btn btn-warning' role='button'>Editar</a></td><td><a href=borrar.php?id_municipio={$row['id_municipio']} class='btn btn-danger' role='button'>Borrar</a></td> "; 
        echo "</tr>"; 
        } 
    echo "</table>"; 
}

function borrar_municipio($id_municipio){
    $queryborrar = "DELETE FROM `municipios` WHERE `id_municipio` = '$id_municipio' ";
    mysqli_query($GLOBALS["conectar"], $queryborrar) ; 
    mensaje_confirmacion("municipio borrado");
}

function agregar_municipio($nombre_municipio,$poblacion){
    $queryagregar = "INSERT INTO `municipios` ( `nombre_municipio` ,  `poblacion` ) VALUES(  '{$nombre_municipio}' ,  '{$poblacion}' ) ";
    mysqli_query($GLOBALS["conectar"],$queryagregar) or die(mysqli_error($GLOBALS["conectar"])); 
    mensaje_confirmacion("municipio creado");
}

function actualizar_municipio(){
    foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($GLOBALS["conectar"],$value); } 
    $queryactualizar = "UPDATE `municipios` SET  `nombre_municipio` =  '{$nombre_municipio}' ,  `poblacion` =  '{$poblacion}' WHERE `id_municipio` = '$id_municipio'"; 
    mysqli_query($GLOBALS["conectar"], $queryactualizar) or die(mysqli_error($GLOBALS["conectar"])); 
    mensaje_confirmacion("municipio editado");
}

function mensaje_confirmacion($mensaje){
    echo "<br /><center><h3><p class='bg-info'>".$mensaje."<br />"; 
    echo "<a href='index.php' class='btn btn-info'>volver al inicio</a></p></h3></center>";
    echo "<meta http-equiv='Refresh' content='3;url=index.php'> ";
}

?>