<?php
require_once __DIR__ . '/../../clases/Categoria.php';


if (!in_array($_SESSION['loggedIn']['rol'], ['admin', 'superadmin'])) {
  header('Location: index.php?seccion=dashboard');
  exit;
}

$categorias = Categoria::todos();
?>

<section id="sectionProductos">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Administración de Categorías</h1>

    <a href="index.php?seccion=categoria-nueva" class="btn btn-dark">
      + Añadir categoría
    </a>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th style="width: 80px;">ID</th>
          <th>Categoría</th>
          <th class="text-center" style="width: 180px;">Acciones</th>
        </tr>
      </thead>
      <tbody>

        <?php if (!empty($categorias)): ?>
          <?php foreach ($categorias as $categoria): ?>
            <tr>
              <td><?= $categoria->getCategoria_id() ?></td>
              <td><?= htmlspecialchars($categoria->getNombre()) ?></td>
              <td class="text-center">

                <!-- EDITAR  -->
                <a href="index.php?seccion=categoria-editar&id=<?= $categoria->getCategoria_id() ?>"
                  class="btn btn-sm btn-outline-primary me-1">
                  Editar
                </a>

                <!-- ELIMINAR -->
                <form action="index.php?seccion=categoria-eliminar"
                  method="POST"
                  class="d-inline">

                  <input type="hidden"
                    name="id"
                    value="<?= $categoria->getCategoria_id() ?>">

                  <button class="btn btn-sm btn-danger"
                    onclick="return confirm('¿Eliminar esta categoría?')">
                    Eliminar
                  </button>
                </form>

              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="3" class="text-center">
              No hay categorías registradas
            </td>
          </tr>
        <?php endif; ?>

      </tbody>
    </table>
  </div>
</section>