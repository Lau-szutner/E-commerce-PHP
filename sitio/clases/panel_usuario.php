<?php
require_once __DIR__ . '/../clases/Compras.php';

$userID = $_SESSION['loggedIn']['id'] ?? false;

if (!$userID) {
  $_SESSION['mensajeFeedback'] = "Debes iniciar sesión para acceder al panel.";
  $_SESSION['mensajeFeedbackTipo'] = "danger";
  header("Location: index.php?seccion=login");
  exit;
}

$compras = Compras::getByUser($userID);
?>

<h2>Mis compras</h2>

<?php if (isset($_SESSION['mensajeFeedback'])): ?>
  <div class="alert alert-<?= $_SESSION['mensajeFeedbackTipo'] ?>">
    <?= $_SESSION['mensajeFeedback'] ?>
  </div>
  <?php unset($_SESSION['mensajeFeedback'], $_SESSION['mensajeFeedbackTipo']); ?>
<?php endif; ?>

<?php if (empty($compras)): ?>
  <p>No realizaste compras aún.</p>
<?php else: ?>

  <?php foreach ($compras as $compra): ?>
    <div class="card mb-3">
      <div class="card-body">
        <p><strong>Fecha:</strong> <?= $compra['fecha'] ?></p>
        <p><strong>Importe:</strong> $<?= number_format($compra['importe'], 2) ?></p>

        <h5>Detalle</h5>
        <ul>
          <?php
          $detalle = Compras::getDetalle($compra['id']);
          foreach ($detalle as $item):
          ?>
            <li>
              <?= $item['nombre'] ?> —
              <?= $item['cantidad'] ?> x $<?= $item['precio'] ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  <?php endforeach; ?>

<?php endif; ?>