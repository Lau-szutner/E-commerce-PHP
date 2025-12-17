<?php
require_once __DIR__ . '/../../conexion.php';

if (!in_array($_SESSION['loggedIn']['rol'], ['admin', 'superadmin'])) {
  header('Location: index.php?seccion=dashboard');
  exit;
}

$sql = "SELECT usuario_id, email, rol FROM usuario";
$stmt = $conn->prepare($sql);
$stmt->execute();

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="mb-4">Listado de Usuarios</h1>

<div class="table-responsive">
  <table class="table table-bordered table-hover align-middle">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Rol</th>
      </tr>
    </thead>
    <tbody>

      <?php if (!empty($usuarios)): ?>
        <?php foreach ($usuarios as $usuario): ?>
          <tr>
            <td><?= htmlspecialchars($usuario['usuario_id']) ?></td>
            <td><?= htmlspecialchars($usuario['email']) ?></td>
            <td>
              <?php
              $rol = $usuario['rol'];
              $badge = match ($rol) {
                'admin' => 'danger',
                'superadmin' => 'warning',
                default => 'secondary',
              };
              ?>
              <span class="badge bg-<?= $badge ?>">
                <?= htmlspecialchars($rol) ?>
              </span>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="3" class="text-center">No hay usuarios registrados</td>
        </tr>
      <?php endif; ?>

    </tbody>
  </table>
</div>