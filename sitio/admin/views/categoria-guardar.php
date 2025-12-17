<?php
require_once __DIR__ . '/../../clases/Categoria.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nombre'])) {
  Categoria::crear(trim($_POST['nombre']));
  $_SESSION['mensajeFeedback'] = "Categoría creada correctamente";
  $_SESSION['mensajeFeedbackTipo'] = "success";
}

header("Location: index.php?seccion=categorias");
exit;
