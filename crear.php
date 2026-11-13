<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Añadir Libro</title>
  <style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #eaeaea;
  }

  .formulario {
    width: 50%;
    margin: 40px auto;
    background: white;
    padding: 25px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.1);
  }

  h2 {
    color: #0056b3;
    text-align: center;
  }

  label {
    display: block;
    margin-top: 15px;
    margin-bottom: 5px;
    font-weight: bold;
  }

  input[type="text"],
  input[type="number"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
  }

  button {
    background-color: #0056b3;
    color: white;
    border: none;
    padding: 10px 20px;
    margin-top: 20px;
    cursor: pointer;
    border-radius: 3px;
    width: 100%;
    font-size: 16px;
  }

  button:hover {
    background-color: #003d82;
  }

  .cancelar {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #666;
    text-decoration: none;
  }
  </style>
</head>

<body>
  <div class="formulario">
    <h2>Añadir Nuevo Libro</h2>
    <form action="guardar.php" method="POST">
      <label>Título:</label>
      <input type="text" name="titulo" required>

      <label>ISBN:</label>
      <input type="text" name="isbn" required>

      <label>Año de Publicación:</label>
      <input type="number" name="ano_publicacion" min="1501" required>

      <label>Idioma:</label>
      <input type="text" name="idioma" required>

      <label>Número de Páginas:</label>
      <input type="number" name="numero_paginas" min="1" required>

      <button type="submit">Guardar Libro</button>
      <a href="index.php" class="cancelar">Cancelar y volver</a>
    </form>
  </div>
</body>

</html>