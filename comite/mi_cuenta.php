<?php
require_once '../includes/auth.php';
require_once '../config/conexion.php';

$id_usuario = $_SESSION['usuario']['id_usuario'];

// Obtener datos del comité
$sql = "SELECT nombre, email, telefono, rol, subrol
        FROM usuarios
        WHERE id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_usuario]);
$usuario = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mi cuenta - Comité</title>
  <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

<h2>👤 Mi cuenta (Comité)</h2>

<h3>Información personal</h3>
<p><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></p>
<p><strong>Correo electrónico:</strong> <?= htmlspecialchars($usuario['email']) ?></p>
<p><strong>Teléfono:</strong> <?= htmlspecialchars($usuario['telefono']) ?>
    <a href="editar_telefono.php">[Editar]</a></p>

<hr>

<h3>Información del comité</h3>
<p><strong>Rol:</strong> Comité</p>
<p><strong>Cargo:</strong> <?= ucfirst($usuario['subrol']) ?></p>

<hr>

<h3>Opciones de cuenta</h3>
<form action="../php/auth/logout.php" method="POST">
  <button type="submit">Cerrar sesión</button>
</form>

<p><a href="dashboard.php">← Volver al panel</a></p>

</body>
</html>
