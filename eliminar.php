<?php
require 'conexion.php';
$pdo = Conexion::conectar();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM libro WHERE id_libro = ?");
    $stmt->execute([$id]);
}
header('Location: index.php');
exit;
?>