<?php

// Conectar a DB
require '../../includes/config/databases.php';
$db = conectarDB();

require '../../includes/funciones.php';
incluirTemplate('header');

?>

<main class="contenedor seccion">
  <h1>Crear Propiedades</h1>

  <a href="/admin" class="boton boton-verde">Volver</a>

  <form action="" class="formulario">
    <fieldset>

      <legend>Información General</legend>
      <label for="titulo">Titulo</label>
      <input type="text" placeholder="Titulo Propiedad" id="titulo">

      <label for="precio">Precio</label>
      <input type="number" placeholder="Precio Propiedad" id="precio">

      <label for="imagen">Imagen</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png">

      <label for="descripcion">Descripcion</label>
      <textarea id="descripcion"></textarea>

    </fieldset>
    <fieldset>
      <legend>Información de la Propiedad</legend>

      <label for="habitaciones">Habitaciones</label>
      <input type="number" placeholder="Ej: 3" id="habitaciones" min="1" max="9">
      
      <label for="wc">Baños</label>
      <input type="number" placeholder="Ej: 3" id="wc" min="1" max="9">
      
      <label for="estacionamiento">Estacionamiento</label>
      <input type="number" placeholder="Ej: 3" id="estacionamiento" min="1" max="9">
    </fieldset>
    <fieldset>
      <legend>Vendedor</legend>

      <select name="vendedor" id="">
        <option value="" disabled selected>-- Seleccione --</option>
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