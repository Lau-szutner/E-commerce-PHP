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
        $this->producto_id = $data['producto_id'];
        $this->nombre = $data['nombre'];
        $this->categoria_id = $data['categoria_id'];
        $this->descripcion = $data['descripcion'];
        $this->precio = $data['precio'];
        $this->disponibilidad = $data['disponibilidad'];
        $this->imagen = $data['imagen'];
        $this->cuerpo = $data['cuerpo'];
        $this->usuario_fk = $data['usuario_fk'];

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

    /**
     * Get the value of producto_id
     */ 
    public function getProducto_id()
    {
        return $this->producto_id;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of disponibilidad
     */ 
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Get the value of cuerpo
     */ 
    public function getCuerpo()
    {
        return $this->cuerpo;
    }

    /**
     * Get the value of usuario_fk
     */ 
    public function getUsuario_fk()
    {
        return $this->usuario_fk;
    }
}
?>


