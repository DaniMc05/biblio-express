<?php
require 'conexion.php';
$pdo = Conexion::conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $isbn = trim($_POST['isbn'] ?? '');
    $ano = filter_input(INPUT_POST, 'ano_publicacion', FILTER_VALIDATE_INT);
    $idioma = trim($_POST['idioma'] ?? '');
    $paginas = filter_input(INPUT_POST, 'numero_paginas', FILTER_VALIDATE_INT);

    if ($titulo && $isbn && $ano > 1500 && $idioma && $paginas > 0) {
        $sql = "INSERT INTO libro (titulo, isbn, ano_publicacion, idioma, numero_paginas) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$titulo, $isbn, $ano, $idioma, $paginas]);
        header('Location: index.php');
        exit;
    } else {
        echo "Error: Revisa que los campos no estén vacíos y que los números sean válidos.";
    }
}
?>