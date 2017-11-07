<?php
include("conexion.php");

$titulo = "Agregar Municipios";
show_head($titulo);
?>
    <section>
<?php
if (isset($_POST['submitted'])) { 

$nombre_municipio = $_POST['nombre_municipio'];
$poblacion = $_POST['poblacion']; 

agregar_municipio($nombre_municipio,$poblacion); 
} ?>

<br />

<div class="container">
<form class="form-horizontal" name="registrar" role="form" action='' method='POST'>
    <div class="form-group">
        <label class="col-sm-2 control-label">Nombre Municipio:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Ej.: Pereira" name='nombre_municipio' data-validation="length" data-validation-length="min1">
            </div> 
        <label class="col-sm-2 control-label">Población:</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Ej.: 500000" name='poblacion' data-validation="length" data-validation-length="min1">
            </div>   
      </div>                
      <input type='hidden' value='1' name='submitted' />
            
    <button type="submit" name="registro" class="btn btn-primary">Registrar</button>
</form>
</div> 
  <ul>
      <li><a href="listar.php" class="btn btn-primary">listar</a></li>
      <li><a href="index.php" class="btn btn-info">Volver</a></li>
    </ul>
  </section>

<?php 
    show_footer();
?>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.form-validator.min.js"></script>
  <script> $.validate(); </script>
</body>
</html>