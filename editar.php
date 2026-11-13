<?php
require 'conexion.php';
$pdo = Conexion::conectar();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) die("ID de libro inválido.");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $isbn = trim($_POST['isbn'] ?? '');
    $ano = filter_input(INPUT_POST, 'ano_publicacion', FILTER_VALIDATE_INT);
    $idioma = trim($_POST['idioma'] ?? '');
    $paginas = filter_input(INPUT_POST, 'numero_paginas', FILTER_VALIDATE_INT);

    if ($titulo && $isbn && $ano > 1500 && $idioma && $paginas > 0) {
        $sql = "UPDATE libro SET titulo = ?, isbn = ?, ano_publicacion = ?, idioma = ?, numero_paginas = ? WHERE id_libro = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$titulo, $isbn, $ano, $idioma, $paginas, $id]);
        header('Location: index.php');
        exit;
    } else {
        $error = "Porfa revisa que ningún campo esté vacío y los números sean válidos.";
    }
}

$stmt = $pdo->prepare("SELECT * FROM libro WHERE id_libro = ?");
$stmt->execute([$id]);
$libro = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$libro) die("El libro no existe.");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Editar Libro</title>
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
    color: #d39e00;
    text-align: center;
  }

  .error-msg {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border: 1px solid #f5c6cb;
    margin-bottom: 15px;
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
    background-color: #ffc107;
    color: black;
    border: 1px solid #d39e00;
    padding: 10px 20px;
    margin-top: 20px;
    cursor: pointer;
    border-radius: 3px;
    width: 100%;
    font-size: 16px;
    font-weight: bold;
  }

  button:hover {
    background-color: #e0a800;
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
    <h2>Editar Libro</h2>

    <?php if(!empty($error)): ?>
    <div class="error-msg"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <label>Título:</label>
      <input type="text" name="titulo" value="<?= htmlspecialchars($libro['titulo']) ?>" required>

      <label>ISBN:</label>
      <input type="text" name="isbn" value="<?= htmlspecialchars($libro['isbn']) ?>" required>

      <label>Año:</label>
      <input type="number" name="ano_publicacion" min="1501" value="<?= htmlspecialchars($libro['ano_publicacion']) ?>"
        required>

      <label>Idioma:</label>
      <input type="text" name="idioma" value="<?= htmlspecialchars($libro['idioma']) ?>" required>

      <label>Páginas:</label>
      <input type="number" name="numero_paginas" min="1" value="<?= htmlspecialchars($libro['numero_paginas']) ?>"
        required>

      <button type="submit">Actualizar Libro</button>
      <a href="index.php" class="cancelar">Cancelar y volver</a>
    </form>
  </div>
</body>

</html>