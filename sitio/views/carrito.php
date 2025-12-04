<?php
require_once __DIR__ . '/../clases/Carrito.php';

$items = Carrito::obtenerCarrito();
$total = Carrito::precio_total();
?>

<h1>Tu carrito</h1>

<?php if (empty($items)): ?>
  <p>El carrito está vacío.</p>

<?php else: ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Imagen</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($items as $item): ?>
        <tr>
          <td><img src="img/productos/<?= $item['imagen'] ?>" width="70"></td>
          <td><?= $item['nombre'] ?></td>
          <td>$<?= $item['precio'] ?></td>
          <td><?= $item['cantidad'] ?></td>
          <td>$<?= $item['precio'] * $item['cantidad'] ?></td>
          <td>
            <a class="btn btn-danger btn-sm"
              href="acciones/eliminar_item.php?id=<?= $item['producto_id'] ?>">
              X
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <h3>Total: $<?= $total ?></h3>

<?php endif; ?>