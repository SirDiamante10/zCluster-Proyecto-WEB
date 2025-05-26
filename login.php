<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión - Cluster Admin</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
  <h2>Acceso al sistema</h2>

  <?php
  if (isset($_SESSION['error_login'])) {
      echo "<p style='color:red'>" . $_SESSION['error_login'] . "</p>";
      unset($_SESSION['error_login']);
  }
  ?>

  <form action="php/auth/login.php" method="POST">
    <label for="email">Correo electrónico:</label><br>
    <input type="email" name="email" required><br>

    <label for="password">Contraseña:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Ingresar</button>
  </form>
</body>
</html>
