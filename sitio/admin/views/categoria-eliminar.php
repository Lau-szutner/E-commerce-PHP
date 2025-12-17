<?php
require_once __DIR__ . '/../../clases/Categoria.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  Categoria::eliminar((int) $_POST['id']);
  $_SESSION['mensajeFeedback'] = "Categoría eliminada correctamente";
  $_SESSION['mensajeFeedbackTipo'] = "success";
}

header("Location: index.php?seccion=categorias");
exit;
