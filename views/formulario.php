<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Estudiantes</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; }
        input { width: 100%; padding: 8px; margin: 6px 0 14px; box-sizing: border-box; }
        button { padding: 10px 20px; background: #0057b7; color: #fff; border: none; cursor: pointer; }
    </style>
</head>
<body>
<h2>Registro de Estudiante</h2>
<form action="../includes/procesar_registro.php" method="POST">
    <label>Cédula (10 dígitos):</label>
    <input type="text" name="cedula" pattern="\d{10}" maxlength="10" required>

    <label>Nombres:</label>
    <input type="text" name="nombres" maxlength="80" required>

    <label>Apellidos:</label>
    <input type="text" name="apellidos" maxlength="80" required>

    <label>Correo:</label>
    <input type="email" name="correo" maxlength="120" required>

    <label>Carrera:</label>
    <input type="text" name="carrera" maxlength="80" required>

    <label>Fecha de nacimiento:</label>
    <input type="date" name="fecha_nacimiento" required>

    <button type="submit">Guardar Estudiante</button>
</form>
</body>
</html>