<?php 


require_once __DIR__ . '/Conexion.php';

class Producto 
// definit que tipo de datos es cada uno? 
{
    protected int $producto_id;
    protected string $nombre; 
    protected string $categoria; 
    protected string $descripcion;
    protected float $precio;
    protected bool $disponibilidad; 
    protected string $imagen; 
    protected string $cuerpo;

    public function asignarDatos (array $data): void {
        $this -> producto_id = $data['producto_id'];
        $this -> nombre = $data['nombre'];
        $this -> categoria = $data['categoria'];
        $this -> descripcion = $data['descripcion'];
        $this -> precio = $data['precio'];
        $this -> disponibilidad = $data['disponibilidad'];
        $this -> imagen = $data['imagen'];
        $this -> cuerpo = $data['cuerpo'];
    }
    
    /** 
    *@return self[]
    */ 


    public function productosTodos(): array {
        $conn = (new Conexion)->obtenerConexion();
        $consulta = "SELECT * FROM producto";
        $stmt = $conn->prepare($consulta);
        $stmt->execute();
    
        $productosArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $productos = [];
        foreach ($productosArray as $productoData) {
            $producto = new Producto();
            $producto->asignarDatos($productoData);
            $productos[] = $producto;
            }
    
            return $productos;
            echo 'funcion ejecutada';

        
    }
}
?>


