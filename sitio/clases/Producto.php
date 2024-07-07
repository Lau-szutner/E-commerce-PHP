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
    protected ?string $imagen = null;
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
    
        
            
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetchAll();
        
    }
    public function actualizar() {
        $conn = (new Conexion)->obtenerConexion();
        
        $consulta = "UPDATE productos 
                    SET 
                        nombre      = :nombre, 
                        descripcion = :descripcion, 
                        cuerpo      = :cuerpo, 
                        precio      = :precio, 
                        disponibilidad = :disponibilidad, 
                        categoria_id = :categoria_id
                    WHERE producto_id = :producto_id";

        $stmt = $conn->prepare($consulta);
        
        $stmt->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindValue(':descripcion', $this->descripcion, PDO::PARAM_STR);
        $stmt->bindValue(':cuerpo', $this->cuerpo, PDO::PARAM_STR);
        $stmt->bindValue(':precio', $this->precio, PDO::PARAM_STR);
        $stmt->bindValue(':disponibilidad', $this->disponibilidad, PDO::PARAM_INT);
        $stmt->bindValue(':categoria_id', $this->categoria_id, PDO::PARAM_INT);
        $stmt->bindValue(':producto_id', $this->producto_id, PDO::PARAM_INT);


        return $stmt->execute();
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


    public function productoPorId(int $producto_id): ?self {
        $conn = (new Conexion)->obtenerConexion();

        $consulta = "SELECT * FROM producto
                    WHERE producto_id = ?";  //holder

        $stmt = $conn->prepare($consulta);
        $stmt->execute([$producto_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $stmt->fetch();

        if (!$producto){
            return null;
        }
        return $producto;
        
    }

    //guarda el producto en bd
    public function crear(array $data){
        $conn = (new Conexion)->obtenerConexion();
        $consulta = "INSERT INTO producto (nombre, 
                                            descripcion, 
                                            cuerpo, 
                                            precio, 
                                            categoria_id, 
                                            imagen, 
                                            usuario_fk)
                    VALUES (:nombre, 
                            :descripcion, 
                            :cuerpo, 
                            :precio, 
                            :categoria_id, 
                            :imagen, 
                            :usuario_fk) ";
         
        $stmt = $conn->prepare($consulta);
        $stmt->execute([
            'nombre'        => $data['nombre'],
            'descripcion'   => $data['descripcion'],
            'cuerpo'        => $data['cuerpo'],
            'precio'        => $data['precio'],
            'categoria_id'  => $data['categoria_id'],
            'imagen'        => $data['imagen'],
            'usuario_fk'    => $data['usuario_fk']
        ]);
    }


    public function eliminar(int $pk): bool {
        $conn = (new Conexion)->obtenerConexion();

        $consulta = "DELETE FROM producto
                    WHERE producto_id = ?";  //holder

        $stmt = $conn->prepare($consulta);
        $stmt->execute([$pk]);
        
        return true;
    }
}
?>


