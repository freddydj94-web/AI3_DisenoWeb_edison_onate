<?php
require_once __DIR__ . '/../config/conexion.php';

// Validar que venga un ID numérico
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Sentencia preparada para borrar
        $sql = "DELETE FROM estudiantes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        // Redirigir al listado después de borrar
        header('Location: ../views/listado.php?ok=delete');
        exit;

    } catch (PDOException $e) {
        error_log("Error al eliminar: " . $e->getMessage());
        die("Error al intentar eliminar el registro.");
    }
} else {
    header('Location: ../views/listado.php');
    exit;
}
?>