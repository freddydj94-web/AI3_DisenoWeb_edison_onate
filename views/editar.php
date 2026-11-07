<?php
require_once __DIR__ . '/../config/conexion.php';

// Verificar que el ID exista
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: listado.php');
    exit;
}

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM estudiantes WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $estudiante = $stmt->fetch();

    if (!$estudiante) {
        die("Estudiante no encontrado.");
    }
} catch (PDOException $e) {
    die("Error al buscar el estudiante.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; }
        input { width: 100%; padding: 8px; margin: 6px 0 14px; box-sizing: border-box; }
        button { padding: 10px 20px; background: #f0ad4e; color: #fff; border: none; cursor: pointer; }
    </style>
</head>
<body>
<h2>Editar Estudiante</h2>
<form action="../includes/procesar_edicion.php" method="POST">
    <!-- Campo oculto para enviar el ID -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($estudiante['id']) ?>">

    <label>Cédula (10 dígitos):</label>
    <input type="text" name="cedula" pattern="\d{10}" maxlength="10" value="<?= htmlspecialchars($estudiante['cedula']) ?>" required>

    <label>Nombres:</label>
    <input type="text" name="nombres" maxlength="80" value="<?= htmlspecialchars($estudiante['nombres']) ?>" required>

    <label>Apellidos:</label>
    <input type="text" name="apellidos" maxlength="80" value="<?= htmlspecialchars($estudiante['apellidos']) ?>" required>

    <label>Correo:</label>
    <input type="email" name="correo" maxlength="120" value="<?= htmlspecialchars($estudiante['correo']) ?>" required>

    <label>Carrera:</label>
    <input type="text" name="carrera" maxlength="80" value="<?= htmlspecialchars($estudiante['carrera']) ?>" required>

    <label>Fecha de nacimiento:</label>
    <input type="date" name="fecha_nacimiento" value="<?= htmlspecialchars($estudiante['fecha_nacimiento']) ?>" required>

    <button type="submit">Actualizar Estudiante</button>
    <a href="listado.php" style="margin-left: 15px; text-decoration: none; color: #555;">Cancelar</a>
</form>
</body>
</html>