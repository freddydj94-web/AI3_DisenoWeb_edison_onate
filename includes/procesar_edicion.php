<?php
require_once __DIR__ . '/../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../views/listado.php');
    exit;
}

$id        = $_POST['id'] ?? '';
$cedula    = trim($_POST['cedula'] ?? '');
$nombres   = trim($_POST['nombres'] ?? '');
$apellidos = trim($_POST['apellidos'] ?? '');
$correo    = filter_var($_POST['correo'] ?? '', FILTER_SANITIZE_EMAIL);
$carrera   = trim($_POST['carrera'] ?? '');
$fecha     = $_POST['fecha_nacimiento'] ?? '';

// Validaciones básicas
if (!preg_match('/^\d{10}$/', $cedula) || empty($nombres) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    die("Datos inválidos. Por favor, regrese y verifique el formulario.");
}

try {
    // Sentencia preparada para actualizar
    $sql = "UPDATE estudiantes 
            SET cedula = :cedula, nombres = :nombres, apellidos = :apellidos, 
                correo = :correo, carrera = :carrera, fecha_nacimiento = :fecha 
            WHERE id = :id";
            
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':cedula'    => $cedula,
        ':nombres'   => $nombres,
        ':apellidos' => $apellidos,
        ':correo'    => $correo,
        ':carrera'   => $carrera,
        ':fecha'     => $fecha,
        ':id'        => $id
    ]);

    header('Location: ../views/listado.php?ok=update');
    exit;

} catch (PDOException $e) {
    error_log("Error al actualizar: " . $e->getMessage());
    if ($e->getCode() === '23000') {
        die("La cédula o el correo ya están registrados en otro estudiante.");
    }
    die("Error al actualizar. Intente nuevamente.");
}
?>