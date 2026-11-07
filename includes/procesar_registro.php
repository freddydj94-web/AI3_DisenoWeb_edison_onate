<?php

require_once __DIR__ . '/../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../views/formulario.php');
    exit;
}

$cedula   = trim($_POST['cedula'] ?? '');
$nombres  = trim($_POST['nombres'] ?? '');
$apellidos= trim($_POST['apellidos'] ?? '');
$correo   = filter_var($_POST['correo'] ?? '', FILTER_SANITIZE_EMAIL);
$carrera  = trim($_POST['carrera'] ?? '');
$fecha    = $_POST['fecha_nacimiento'] ?? '';

$errores = [];
if (!preg_match('/^\d{10}$/', $cedula))        $errores[] = "Cédula inválida.";
if ($nombres === '' || strlen($nombres) > 80)   $errores[] = "Nombres inválidos.";
if ($apellidos === '' || strlen($apellidos) > 80) $errores[] = "Apellidos inválidos.";
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) $errores[] = "Correo inválido.";
if ($carrera === '')                             $errores[] = "Carrera requerida.";
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $fecha))$errores[] = "Fecha inválida.";

if ($errores) {
    die("Errores: " . implode(" | ", $errores));
}

try {
    $sql = "INSERT INTO estudiantes (cedula, nombres, apellidos, correo, carrera, fecha_nacimiento) 
            VALUES (:cedula, :nombres, :apellidos, :correo, :carrera, :fecha)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':cedula'   => $cedula,
        ':nombres'  => $nombres,
        ':apellidos'=> $apellidos,
        ':correo'   => $correo,
        ':carrera'  => $carrera,
        ':fecha'    => $fecha,
    ]);

    header('Location: ../views/listado.php?ok=1');
    exit;

} catch (PDOException $e) {
    error_log("Error al insertar: " . $e->getMessage());
    if ($e->getCode() === '23000') {
        die("La cédula o el correo ya están registrados.");
    }
    die("Error al guardar. Intente nuevamente.");
}
?>