<?php
require_once __DIR__ . '/../config/conexion.php';

try {
    $stmt = $pdo->query("SELECT * FROM estudiantes ORDER BY fecha_creacion DESC");
    $registros = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Error al consultar registros.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Estudiantes</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #0057b7; color: white; }
    </style>
</head>
<body>
<h2>Estudiantes Registrados</h2>
<?php if (isset($_GET['ok'])): ?>
    <p style="color:green">✅ Registro insertado correctamente.</p>
<?php endif; ?>
<table>
    <thead>
        <tr>
            <th>ID</th><th>Cédula</th><th>Nombres</th>
            <th>Apellidos</th><th>Correo</th><th>Carrera</th><th>Nacimiento</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($registros as $r): ?>
        <tr>
            <td><?= htmlspecialchars($r['id'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['cedula'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['nombres'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['apellidos'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['correo'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['carrera'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($r['fecha_nacimiento'], ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="formulario.php">← Volver al formulario</a>
</body>
</html>