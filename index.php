<?php
require 'conexion.php';
$pdo = Conexion::conectar();

$stmt = $pdo->query('SELECT * FROM libro');
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>BiblioExpress - Inicio</title>
  <style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #eaeaea;
    color: #333;
  }

  .contenedor {
    width: 85%;
    margin: 30px auto;
    background: #ffffff;
    padding: 25px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.1);
  }

  h1 {
    color: #0056b3;
    border-bottom: 2px solid #0056b3;
    padding-bottom: 10px;
  }

  .btn-nuevo {
    background-color: #28a745;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 3px;
    display: inline-block;
    margin-bottom: 15px;
    font-weight: bold;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
  }

  th,
  td {
    border: 1px solid #dddddd;
    padding: 12px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
  }

  .btn-editar {
    background-color: #ffc107;
    color: black;
    padding: 6px 12px;
    text-decoration: none;
    border-radius: 3px;
  }

  .btn-borrar {
    background-color: #dc3545;
    color: white;
    padding: 6px 12px;
    text-decoration: none;
    border-radius: 3px;
  }
  </style>
</head>

<body>
  <div class="contenedor">
    <h1>Catalogo de Libros</h1>
    <a href="crear.php" class="btn-nuevo">+ Añadir Nuevo Libro</a>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>ISBN</th>
          <th>Año</th>
          <th>Idioma</th>
          <th>Paginas</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($libros as $libro): ?>
        <tr>
          <td><?= htmlspecialchars($libro['id_libro']) ?></td>
          <td><?= htmlspecialchars($libro['titulo']) ?></td>
          <td><?= htmlspecialchars($libro['isbn']) ?></td>
          <td><?= htmlspecialchars($libro['ano_publicacion']) ?></td>
          <td><?= htmlspecialchars($libro['idioma']) ?></td>
          <td><?= htmlspecialchars($libro['numero_paginas']) ?></td>
          <td>
            <a href="editar.php?id=<?= $libro['id_libro'] ?>" class="btn-editar">Editar</a>
            <a href="eliminar.php?id=<?= $libro['id_libro'] ?>" class="btn-borrar"
              onclick="return confirm('¿De verdad quieres borrar este libro?');">Eliminar</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>