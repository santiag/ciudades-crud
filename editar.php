<?php
include("conexion.php");

$titulo = "Editar Municipios";
show_head($titulo);
?>
    <section>
    <?php  
    if (isset($_GET['id_municipio']) ) { 
        $id_municipio = (int) $_GET['id_municipio']; 
        if (isset($_POST['submitted'])) {  
            $nombre_municipio = $_POST['nombre_municipio'];
            $poblacion = $_POST['poblacion'];
            actualizar_municipio($nombre_municipio,$poblacion); 
        } 
        $querymunicipios = "SELECT * FROM `municipios` WHERE `id_municipio` = '$id_municipio' ";
        $row = mysqli_fetch_array ( mysqli_query($conectar, $querymunicipios)); 
?>

<br />
<div class="container">
<form class="form-horizontal" name="registrar" role="form" action='' method='POST'>
    <div class="form-group">
        <label class="col-sm-2 control-label">Nombre municipio:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name='nombre_municipio' value='<?php echo stripslashes($row['nombre_municipio']) ?>' data-validation="length" data-validation-length="min1">
            </div> 
        <label class="col-sm-2 control-label">Poblacion:</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" name='poblacion' value='<?php echo stripslashes($row['poblacion']) ?>' data-validation="length" data-validation-length="min1">
            </div>
                <input type='hidden' value='1' name='submitted' />
            
    </div><button type="submit" name="registro" class="btn btn-success">Guardar</button>
</form> 
<?php }
?>
</div>
  <ul>
      <li><a href="listar.php" class="btn btn-primary">listar</a></li>
      <li><a href="index.php" class="btn btn-info">Volver</a></li>
    </ul>
  </section>

<?php 
    show_footer();
?>
</body>
</html>