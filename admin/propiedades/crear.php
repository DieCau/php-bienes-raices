<?php

// Conectar a DB
require '../../includes/config/databases.php';
$db = conectarDB();

// Array con mensajes de errores
$errores = [];


// Ejecutar el codigo despues de que el usuario envia el formulario
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";

  $titulo = $_POST['titulo'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $habitaciones = $_POST['habitaciones'];
  $wc = $_POST['wc'];
  $estacionamiento = $_POST['estacionamiento'];
  $vendedores_id = $_POST['vendedor'];

  // Validacion
  if(!$titulo) {
    $errores[] = "Debes añadir un titulo";
  }  
   
  if(!$precio) {
    $errores[] = "Debes añadir un precio";
  }
  
  if(strlen($descripcion) < 50) {
    $errores[] = "Debes añadir una descripcion de al menos 50 caracteres";
  }
  
  if(!$habitaciones) {
    $errores[] = "Debes añadir un titulo";
  }
  
  if(!$wc) {
    $errores[] = "El numero de baños es obligatorio";
  }

  if(!$estacionamiento) {
    $errores[] = "El numero de estacionamientos es obligatorio";
  }

  if(!$vendedores_id) {
    $errores[] = "Elige un vendedor";
  }
  
  
  // echo "<pre>";
  //   var_dump($errores);
  // echo "</pre>";


  // Revisar que el array de errores este vacio
  if(empty($errores)) {
        
      // Insertar en la BDD
      $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id) VALUES ($titulo, $precio, $descripcion, $habitaciones, $wc, $estacionamiento, $vendedores_id)";  
    
      // Almacenar en la BDD
      $resultado = mysqli_query($db, $query);
    
      if($resultado) {
        echo "Insertado Correctamente";
      }
  
    }


  }




require '../../includes/funciones.php';
incluirTemplate('header');

?>

<main class="contenedor seccion">
  <h1>Crear Propiedades</h1>

  <a href="/admin" class="boton boton-verde">Volver</a>

  <form action="/admin/propiedades/crear.php" class="formulario" method="POST">
    <fieldset>

      <legend>Información General</legend>
      <label for="titulo">Titulo</label>
      <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">

      <label for="precio">Precio</label>
      <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">

      <label for="imagen">Imagen</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png">

      <label for="descripcion">Descripcion</label>
      <textarea id="descripcion" name="descripcion"></textarea>

    </fieldset>
    <fieldset>
      <legend>Información de la Propiedad</legend>

      <label for="habitaciones">Habitaciones</label>
      <input type="number" name="habitaciones" placeholder="Ej: 3" id="habitaciones" min="1" max="9">
      
      <label for="wc">Baños</label>
      <input type="number" name="wc" placeholder="Ej: 3" id="wc" min="1" max="9">
      
      <label for="estacionamiento">Estacionamiento</label>
      <input type="number" name="estacionamiento" placeholder="Ej: 3" id="estacionamiento" min="1" max="9">
    </fieldset>
    <fieldset>
      <legend>Vendedor</legend>

      <select name="vendedor" id="">
        <option value="" selected>-- Seleccione Vendedor --</option>
        <option value="1">Juan</option>
        <option value="2">Karen</option>
      </select>
    </fieldset>

    <input type="submit" value="Crear Propiedad" class="boton boton-verde">

  </form>
</main>


<?php
incluirTemplate('footer');
?>