<?php
require_once __DIR__ . '/../clases/Carrito.php';

$items = Carrito::obtenerCarrito();
$total = Carrito::precio_total();
?>

<div class="container my-5">

  <h1 class="mb-4 text-center">🛒 Tu carrito</h1>

  <?php if (empty($items)): ?>
    <div class="alert alert-info text-center py-4">
      El carrito está vacío.
    </div>

  <?php else: ?>

    <div class="card shadow-sm">
      <div class="card-body">

        <form action="acciones/actualizar_carrito.php" method="post">

          <table class="table align-middle table-striped">
            <thead class="table-dark">
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
                  <td>
                    <img
                      src="img/productos/<?= $item['imagen'] ?>"
                      width="70"
                      class="rounded shadow-sm">
                  </td>

                  <td class="fw-semibold"><?= $item['nombre'] ?></td>

                  <td class="text-success fw-semibold">
                    $<?= number_format($item['precio'], 2, ',', '.') ?>
                  </td>

                  <td>
                    <input
                      type="number"
                      name="cantidad[<?= $item['producto_id'] ?>]"
                      value="<?= $item['cantidad'] ?>"
                      min="1"
                      class="form-control"
                      style="width:90px;">
                  </td>

                  <td class="fw-bold">
                    $<?= number_format($item['precio'] * $item['cantidad'], 2, ',', '.') ?>
                  </td>

                  <td>
                    <a class="btn btn-danger btn-sm"
                      href="acciones/remove_item.php?id=<?= $item['producto_id'] ?>">
                      ✕
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>

          </table>

          <div class="d-flex justify-content-end gap-2">

            <div class="mt-3 text-end">
              <button type="submit" class="btn btn-warning">Actualizar cantidades</button>
            </div>

            <div class="mt-3 text-end">
              <a href="index.php?seccion=productos" class="btn btn-success ">
                Seguir comprado
              </a>
            </div>
            <div class="mt-3 text-end">
              <a href="acciones/vaciar_carrito.php" class="btn btn-danger ">
                Vaciar carrito
              </a>
            </div>
          </div>
        </form>

      </div>
    </div>

    <div class="text-end mt-4">
      <h3 class="fw-bold">Total:
        <span class="text-success">
          $<?= number_format($total, 2, ',', '.') ?>
        </span>
      </h3>

      <a href="checkout.php" class="btn btn-primary btn-lg mt-3 px-4">
        Finalizar compra
      </a>
    </div>

  <?php endif; ?>

</div>