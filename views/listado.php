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
        .btn-editar { color: #0057b7; text-decoration: none; margin-right: 10px; font-weight: bold; }
        .btn-eliminar { color: #d9534f; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<h2>Estudiantes Registrados</h2>

<?php if (isset($_GET['ok'])): ?>
    <p style="color:green; font-weight: bold;">
        <?php 
            if ($_GET['ok'] == '1') echo "✅ Registro insertado correctamente.";
            if ($_GET['ok'] == 'update') echo "✅ Registro actualizado correctamente.";
            if ($_GET['ok'] == 'delete') echo "🗑️ Registro eliminado correctamente.";
        ?>
    </p>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Carrera</th>
            <th>Nacimiento</th>
            <th>Acciones</th> <!-- COLUMNA NUEVA -->
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
            <td>
                <!-- BOTONES NUEVOS -->
                <a href="editar.php?id=<?= $r['id'] ?>" class="btn-editar">✏️ Editar</a>
                <a href="../includes/eliminar.php?id=<?= $r['id'] ?>" class="btn-eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este estudiante?');">🗑️ Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="formulario.php" style="text-decoration:none; color:#333;">← Volver al formulario</a>
</body>
</html>