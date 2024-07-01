<?php 


require_once __DIR__ . '/Conexion.php';

class Producto 
// definit que tipo de datos es cada uno? 
{
    protected int $producto_id;
    protected string $nombre; 
    protected string $categoria_id; 
    protected ?string $descripcion = null;
    protected float $precio;
    protected bool $disponibilidad; 
    protected string $imagen; 
    protected ?string $cuerpo = null;
    protected ?int $usuario_fk = null;

    public function asignarDatos (array $data): void {
        $this -> producto_id = $data['producto_id'];
        $this -> nombre = $data['nombre'];
        $this -> categoria = $data['categoria'];
        $this -> descripcion = $data['descripcion'];
        $this -> precio = $data['precio'];
        $this -> disponibilidad = $data['disponibilidad'];
        $this -> imagen = $data['imagen'];
        $this -> cuerpo = $data['cuerpo'];
        $this -> usuario_fk = $data['usuario_fk'];

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


